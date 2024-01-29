<?php

namespace App\Http\Controllers\Checkout;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Invest;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\ReferralBonus;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Str;

class ManualController extends Controller
{
    public $gs;
    public  $allusers = [];
    public $referral_ids = [];

    public function __construct()
    {
        $this->gs = Generalsetting::findOrFail(1);
    }

    public function store(Request $request){

        $item_name = $this->gs->title." Invest";
        $item_number = Str::random(4).time();
        $item_amount = $request->amount;

        $order = new Invest();

        $plan = Plan::whereId($request->plan_id)->first();
        $order['transaction_no'] = $item_number;

        $order['user_id'] = $request->user_id;
        $order['plan_id'] = $plan->id;
        $order['currency_id'] = $request->currency_id;
        $order['method'] = $request->method;

        if($request->currency_id){
            $currencyValue = Currency::where('id',$request->currency_id)->first();
            $order['amount'] = $request->amount/$currencyValue->value;
            $profitAmount = ($request->amount * $plan->profit_percentage)/100;
            $order['profit_amount'] = $profitAmount/$currencyValue->value;
        }

        if($plan->lifetime_return){
            $order['lifetime_return'] = 1;
        }

        if($plan->captial_return){
            $order['capital_back'] = 1;
            $order['profit_repeat'] = 0;
        }

        $order['payment_status'] = "pending";
        $order['status'] = 0;

        $order['profit_time'] = Carbon::now()->addHours($plan->schedule_hour);
        $order['txnid'] = $request->txn_id4;
        $order->save();

        $this->refferalBonus($order);

        $user = User::whereId($order->user_id)->first();
        $this->gs = Generalsetting::findOrFail(1);

        $to = $user->email;
        $subject = 'Invest';
        $msg = "Dear Customer,<br> Your invest in process.";

        if($this->gs->is_smtp == 1)
        {

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = $this->gs->smtp_host;
                $mail->SMTPAuth   = true;
                $mail->Username   = $this->gs->smtp_user;
                $mail->Password   = $this->gs->smtp_pass;
                if ($this->gs->smtp_encryption == 'ssl') {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                } else {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                }
                $mail->Port       = $this->gs->smtp_port;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom($this->gs->from_email, $this->gs->from_name);
                $mail->addAddress($user->email, $user->name);
                $mail->addReplyTo($this->gs->from_email, $this->gs->from_name);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $msg;
                $mail->send();
            } catch (Exception $e) {

            }
        }
        else
        {
            $headers = "From: ".$this->gs->from_name."<".$this->gs->from_email.">";
            mail($to,$subject,$msg,$headers);
        }
        return redirect()->route('user.invest.history')->with('message','Invest successfully complete.');
    }

    public function refferalBonus($order){
        if($this->gs->is_affilate == 1){
            $referralUser = User::whereId($order->user_id)->first();
            if(Session::has('affilate') || ($referralUser != NULL && $referralUser->referral_id != 0)){

                if(Session::has('affilate')){
                    $this->referralUsers(Session::get('affilate'));
                }else{
                    if($referralUser->referral_id != 0){
                        $this->referralUsers($referralUser->referral_id);
                    }
                }

                $referral_ids[] = $this->allReferralId();

                if(count($this->allusers) >0){
                    $users = array_reverse($this->allusers);
                    foreach($users as $key=>$data){
                        $user = User::findOrFail($data);
                        $referral = Referral::findOrFail($referral_ids[$key]);

                        $referralAmount = ($order->amount * $referral->percent)/100;

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
                        $trans->txnid = $order->transaction_no;
                        $trans->user_id = $to_user->id;
                        $trans->profit = 'plus';
                        $trans->save();

                        $user->increment('balance',$referralAmount);
                        $referralAmount = 0;
                    }
                }
            }
        }
    }

    public function allReferralId(){
        $referrals = Referral::where('commission_type','invest')->get();
        if(count($referrals)>0){
            foreach($referrals as $key=>$data){
                return $this->referral_ids[] = $data->id;
            }
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
