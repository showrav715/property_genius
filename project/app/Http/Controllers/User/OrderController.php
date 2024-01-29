<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use App\Models\BuyRent;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout($id){
        $data = BuyRent::findOrFail($id);
        $data['property'] = $data->property;
        $data['data'] = $data;
        $data['amount'] = $data->type == 'for_rent' ? rootPrice($data->guarantee_amount) : rootPrice($data->amount);
        $data['availableGatways'] = ['stripe'];
        $data['gateways'] = PaymentGateway::where('status',1)->get();

        return view('user.properties.checkout',$data);
    }
}
