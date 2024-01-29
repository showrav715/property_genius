<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\BuyRent;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\Property;
use App\Models\PropertyEnquiry;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['total_deposits'] = Deposit::whereUserId(auth()->id())->whereStatus('complete')->get();
        $data['total_payouts'] = Withdraw::whereUserId(auth()->id())->whereStatus('completed')->get();
        $data['properties'] = Property::whereUserId(auth()->id())->whereIsInvest(0)->get();
        $data['pending_properties'] = Property::whereUserId(auth()->id())->whereStatus(0)->get();
        $data['invest_properties'] = Property::whereUserId(auth()->id())->whereIsInvest(1)->get();
        $data['rents'] = BuyRent::wherePropertyOwnerId(auth()->id())->whereType('for_rent')->orderBy('id','desc')->get();
        $data['sells'] = BuyRent::wherePropertyOwnerId(auth()->id())->whereType('for_buy')->orderBy('id','desc')->get();
        $data['orders'] = Order::wherePropertyOwnerId(auth()->id())->orderBy('id','desc')->get();
        $data['contacts'] = PropertyEnquiry::whereUserId(auth()->id())->orderBy('id','desc')->get();
        $data['contracts'] = BuyRent::wherePropertyOwnerId(auth()->id())->orderBy('id','desc')->limit(5)->get();

        return view('agent.dashboard',$data);
    }

    public function profile()
    {
        $data = auth()->user();
        return view('agent.profile',compact('data'));
    }

    public function profileupdate(Request $request)
    {
        $rules =
        [
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'email' => 'unique:admins,email,'.auth()->id()
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $input = $request->all();
        $data = auth()->user();
        if ($file = $request->file('photo'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images/',$name);
            @unlink('/assets/images/'.$data->photo);
            $input['photo'] = $name;
        }
        $data->update($input);

        $msg = 'Successfully updated your profile';
        return response()->json($msg);
    }

    public function passwordreset()
    {
        $data = auth()->user();
        return view('agent.password',compact('data'));
    }

    public function changepass(Request $request)
    {
        $admin = auth()->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    return response()->json(array('errors' => [ 0 => 'Confirm password does not match.' ]));
                }
            }else{
                return response()->json(array('errors' => [ 0 => 'Current password Does not match.' ]));
            }
        }
        $admin->update($input);

        $msg = 'Successfully change your password';
        return response()->json($msg);
    }
}
