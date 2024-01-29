<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyRent;
use App\Models\Order;
use Datatables;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = Order::orderBy('id','desc')->get();

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
        return view('admin.contracts.order');
    }
}
