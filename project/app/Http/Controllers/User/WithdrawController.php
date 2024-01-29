<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Models\WithdrawMethod;
use Illuminate\Support\Str;
use Validator;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

  	public function index()
    {
        $data['withdraws'] = Withdraw::whereUserId(auth()->id())->orderBy('id','desc')->limit(6)->get();
        $data['methods'] = WithdrawMethod::whereStatus(1)->orderBy('id','desc')->get();
        return view('user.withdraw.index',$data);
    }

    public function history(Request $request){
        $data['methods'] = WithdrawMethod::whereStatus(1)->orderBy('id','desc')->get();
        $data['withdraws'] = Withdraw::when($request->trx_no,function($query) use ($request){
                                        return $query->where('txnid', $request->trx_no);
                                    })
                                    ->when($request->type,function($query) use ($request){
                                        if($request->type != 'all'){
                                            return $query->where('status',$request->type);
                                        }else{

                                        }
                                    })
                                    ->whereUserId(auth()->id())->orderBy('id','desc')->paginate(10);
        return view('user.withdraw.history',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
        ]);

        $user = auth()->user();
        $method = WithdrawMethod::whereId($request->method_id)->first();

        if($method->min_amount > $request->amount){
            return redirect()->back()->with('warning','Min Amount is '.$method->min_amount);
        }

        if($request->amount > $method->max_amount){
            return back()->with('warning','Max Amount is '.$method->max_amount);
        }

        $currency = Currency::whereId($method->currency_id)->first();
        $amountToDeduct = $request->amount/$currency->value;

        $fee = (($method->percentage / 100) * $request->amount) + $method->fixed;
        $fee = $fee/$currency->value;

        $finalamount = $amountToDeduct + $fee;

        if($request->withdraw_wallet == 'main_wallet'){
            if($finalamount > $user->balance){
                return redirect()->back()->with('warning','Insufficient Balance.');
            }
        }else{
            if($finalamount > $user->interest_balance){
                return redirect()->back()->with('warning','Insufficient Balance.');
            }
        }

        if($request->withdraw_wallet == 'main_wallet'){
            $user->balance = $user->balance - $finalamount;
        }else{
            $user->interest_balance = $user->interest_balance - $finalamount;
        }

        $user->update();

        $txnid = Str::random(12);
        $newwithdraw = new Withdraw();
        $newwithdraw['user_id'] = auth()->id();
        $newwithdraw['currency_id'] = $method->currency_id;
        $newwithdraw['method'] = $method->name;
        $newwithdraw['txnid'] = $txnid;
        $newwithdraw['amount'] = $amountToDeduct;
        $newwithdraw['fee'] = $fee;
        $newwithdraw['details'] = $request->details;
        $newwithdraw->save();

        $trans = new Transaction();
        $trans->email = $user->email;
        $trans->amount = $finalamount;
        $trans->type = "Payout";
        $trans->profit = "minus";
        $trans->txnid = $txnid;
        $trans->user_id = $user->id;
        $trans->save();

        $gs = Generalsetting::findOrFail(1);

        $to = $user->email;
        $subject = 'Withdraw';
        $msg = "Dear Customer,<br> Your withdraw in process.";

        if($gs->is_smtp == 1)
        {
            $data = [
                'to' => $user->email,
                'type' => "Withdraw",
                'cname' => $user->name,
                'oamount' => $newwithdraw->amount,
                'aname' => "",
                'aemail' => "",
                'wtitle' => "",
            ];

            $mailer = new GeniusMailer();
            $mailer->sendAutoMail($data);
        }
        else
        {
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            mail($to,$subject,$msg,$headers);
        }

        return back()->with('message','Withdraw Requesting Successfully');

    }

    public function details(Request $request, $id){
        $data['data'] = Withdraw::findOrFail($id);

        return view('user.withdraw.details',$data);
    }
}
