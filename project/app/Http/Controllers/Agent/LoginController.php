<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('agent.login');
    }

    public function login(Request $request)
    {
        $rules = [
              'email'   => 'required|email',
              'password' => 'required'
            ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            if(Auth::guard('web')->user()->is_agent != 2)
            {
              Auth::guard('web')->logout();
              return response()->json(array('errors' => [ 0 => 'You need be an agent to login' ]));
            }

            if(Auth::guard('web')->user()->is_banned == 1)
            {
              Auth::guard('web')->logout();
              return response()->json(array('errors' => [ 0 => 'You are Banned From this system!' ]));
            }

            if(Auth::guard('web')->user()->email_verified == 'No')
            {
              Auth::guard('web')->logout();
              return response()->json(array('errors' => [ 0 => 'Your Email is not Verified!' ]));
            }

            return response()->json(route('agent.dashboard'));

        }

        return response()->json(array('errors' => [ 0 => 'Credentials Doesn\'t Match !' ]));
    }
}
