<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Schedule::whereUserId(auth()->id())->first();
        return view('agent.schedules.index',compact('data'));
    }

    public function update(Request $request){
        $rules = [
            'times'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $schedule = Schedule::whereUserId(auth()->id())->first();
        $common_rep   = ["value", "{", "}", "[","]",":","\""];
        $times = str_replace($common_rep, '', $request->times);

        if($schedule){
            if (!empty($times))
            {
                $schedule->times = $times;
            }
            $schedule->update();
        }else{
            $schedule = new Schedule();
            $schedule->user_id = auth()->id();
            if (!empty($times))
            {
                $schedule->times = $times;
            }
            $schedule->save();
        }

        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
    }
}
