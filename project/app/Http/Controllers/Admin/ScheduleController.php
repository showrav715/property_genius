<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = Schedule::whereUserId(0)->first();
        return view('admin.schedules.index',compact('data'));
    }

    public function update(Request $request){
        $rules = [
            'times'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $schedule = Schedule::whereUserId(0)->first();
        $common_rep   = ["value", "{", "}", "[","]",":","\""];
        $times = str_replace($common_rep, '', $request->times);

        if($schedule){
            if (!empty($times))
            {
                $schedule->times = $times;
            }else{
                $schedule->times = NULL;
            }
            $schedule->update();
        }else{
            $schedule = new Schedule();
            $schedule->user_id = 0;
            if (!empty($times))
            {
                $schedule->times = $times;
            }else{
                $schedule->times = NULL;
            }
            $schedule->save();
        }

        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
    }
}
