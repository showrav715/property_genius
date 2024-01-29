<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Invest;
use App\Models\PaymentGateway;
use App\Models\Property;
use App\Models\Referral;
use App\Models\ReferralBonus;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class InvestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout($slug){
        $data['property'] = Property::whereSlug($slug)->first();
        $data['availableGatways'] = ['stripe','paypal'];
        $data['gateways'] = PaymentGateway::investBy('id','desc')->whereStatus(1)->get();

        return view('frontend.invest',$data);
    }

    public function history(Request $request){
        $data['invests'] = Invest::when($request->trx_no,function($query) use ($request){
                                        return $query->where('txnid', $request->trx_no);
                                    })
                                    ->when($request->type,function($query) use ($request){
                                        if($request->type == 'pending'){
                                            return $query->where('status',0);
                                        }elseif($request->type == 'running'){
                                            return $query->where('status',1);
                                        }elseif($request->type == 'completed'){
                                            return $query->where('status',2);
                                        }else{

                                        }
                                    })
                                    ->whereUserId(auth()->id())
                                    ->orderBy('id','desc')
                                    ->get();

        return view('user.invest.index',$data);
    }


    public function property(){
        $data['properties'] = Property::whereIsInvest(1)
                                        ->whereStatus(1)
                                        ->orderBy('id', 'desc')
                                        ->limit(6)
                                        ->get();

        return view('user.invest.properties',$data);
    }

    public function store(Request $request){
        $request->validate([
            'amount' => 'required'
        ]);
        $property = Property::findOrFail($request->property_id);
        $user = auth()->user();

        if($property->user_id != NULL){
            if($property->user_id == $user->id){
                return back()->with('warning','You are not allow to invest in own property');
            }
        }

        if($user->balance < $request->amount){
            return back()->with("warning","You don't have sufficient balance");
        }

        if($property->invest_amount == $property->price){
            return back()->with('warning','Funding completed for this property');
        }

        if($request->amount > $property->min_invest && $request->amount < $property->max_invest){
            return back()->with('warning','Amount should be between minimum and maximum invest amount');
        }

        $currentInvestAmount = $request->amount + $property->invest_amount;

        if($currentInvestAmount>$property->price){
            return back()->with('warning','You are unable to invest this amount');
        }

        $data = new Invest();
        $data->transaction_no = Str::random(12);
        $data->property_id = $request->property_id;
        if($property->user_id != NULL){
            $data->property_owner_id = $property->user_id;
            $data->owner_type = 'user';
        }else{
            $data->property_owner_id = $property->admin_id;
            $data->owner_type = 'admin';
        }

        $data->user_id = auth()->id();
        $data->amount = $request->amount;
        $data->return_amount = $request->return_amount;
        $data->profit_time = now()->addYears($property->hold_years);
        $data->status = 1;

        $data->save();

        $property->invest_amount +=$data->amount;
        $property->save();

        $user->balance = $user->balance - $request->amount;
        $user->update();

        return back()->with('message','You have successfully invest in this property.');

    }

    public function refferalBonus($invest){
        if($this->gs->is_affilate == 1){
            $referralUser = User::whereId($invest->user_id)->first();
            if(Session::has('affilate') || ($referralUser != NULL && $referralUser->referral_id != 0)){

                if(Session::has('affilate')){
                    $this->referralUsers(Session::get('affilate'));
                }else{
                    if($referralUser->referral_id != 0){
                        $this->referralUsers($referralUser->referral_id);
                    }
                }

                $referral_ids = $this->allReferralId();

                if(count($this->allusers) >0){
                    $users = array_reverse($this->allusers);
                    foreach($users as $key=>$data){
                        $user = User::findOrFail($data);

                        if($referral = Referral::findOrFail($referral_ids[$key])){

                            $referralAmount = ($invest->amount * $referral->percent)/100;

                            $bonus = new ReferralBonus();
                            $bonus->from_user_id = auth()->id();
                            $bonus->to_user_id = $user->id;
                            $bonus->percentage = $referral->percent;
                            $bonus->level = $referral->level;
                            $bonus->amount = $referralAmount;
                            $bonus->type = 'invest';
                            $bonus->save();

                            $to_user = User::findOrFail($bonus->to_user_id);
                            $trans = new Transaction();
                            $trans->email = $to_user->email;
                            $trans->amount = $referralAmount;
                            $trans->type = "Referral Bonus";
                            $trans->txnid = $invest->transaction_no;
                            $trans->user_id = $to_user->id;
                            $trans->profit = 'plus';
                            $trans->save();

                            if($this->gs->is_smtp == 1)
                            {
                                $data = [
                                    'to' => $to_user->email,
                                    'type' => "referral bonus",
                                    'cname' => $to_user->name,
                                    'oamount' => $referralAmount,
                                    'aname' => "",
                                    'aemail' => "",
                                    'wtitle' => "",
                                ];

                                $mailer = new GeniusMailer();
                                $mailer->sendAutoMail($data);
                            }
                            else
                            {
                               $to = $to_user->email;
                               $subject = "Referral Bonus";
                               $msg = "Hello ".$to_user->name."!\nYou got bonus from referral.\nThank you.";
                               $headers = "From: ".$this->gs->from_name."<".$this->gs->from_email.">";
                               mail($to,$subject,$msg,$headers);
                            }

                            $user->increment('balance',$referralAmount);
                            $referralAmount = 0;
                        }

                    }
                }
            }
        }
    }

    public function allReferralId(){
        $referrals = Referral::where('commission_type','invest')->get();

        if(count($referrals)>0){
            foreach($referrals as $key=>$data){
                $this->referral_ids[] = $data->id;
            }
            return $this->referral_ids;
        }
    }

    public function referralUsers($id)
    {
        $referral = Referral::where('commission_type','invest')->get();

        for($i=1; $i<=count($referral); $i++){
            $user = User::findOrFail($id);
            $this->allusers[] = $user->id;

            if($user->referral_id){
                $id = $user->referral_id;
            }else{
                return false;
            }
        }
        return $this->allusers;
    }
}
