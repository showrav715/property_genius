<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Datatables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $datas = Order::where('property_owner_id',auth()->id())->orderBy('id','desc')->get();

        return Datatables::of($datas)
                        ->addColumn('email',function(Order $data){
                            return $data->user != NULL ? $data->user->name : 'Customer Deleted';
                        })
                        ->editColumn('amount', function(Order $data) {
                            return showNameAmount($data->amount);
                        })
                        ->editColumn('created_at', function(Order $data) {
                            $date = date('d-m-Y',strtotime($data->created_at));
                            return $date;
                        })
                        ->rawColumns([''])
                        ->toJson();
    }

    public function index(){
        return view('agent.order.index');
    }
}
