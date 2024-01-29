<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Datatables;
use App\Models\Invest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables(){
        $datas = Invest::orderBy('id','desc')->get();

        return Datatables::of($datas)
                        ->editColumn('created_at', function(Invest $data) {
                            return $data->created_at->format('d M, Y');
                        })
                        ->editColumn('user_id', function(Invest $data) {
                            return '<div>
                                    '.ucfirst($data->user->name).'
                                    <p>@'.$data->user->email.'</p>
                            </div>';
                        })
                        ->editColumn('property_id', function(Invest $data) {
                            return $data->property->name;
                        })
                        ->editColumn('amount', function(Invest $data){
                            return showAdminAmount($data->amount);
                        })
                        ->editColumn('hold_amount', function(Invest $data){
                            return showAdminAmount($data->hold_amount);
                        })
                        ->editColumn('return_amount', function(Invest $data){
                            return showAdminAmount($data->return_amount);
                        })
                        ->editColumn('status', function(Invest $data) {

                            if($data->status == 0){
                                $status = "Pending";
                                $status_sign = $data->status == 0 ? 'warning' : '';
                            }elseif($data->status == 1){
                                $status = "Running";
                                $status_sign = $data->status == 1 ? 'info' : '';
                            }else{
                                $status = "Completed";
                                $status_sign = $data->status == 2 ? 'success' : '';
                            }

                            return '<div class="btn-group mb-1">
                            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              '.$status .'
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start">
                              <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.invests.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Pending").'</a>
                              <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.invests.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Running").'</a>
                              <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.invests.status',['id1' => $data->id, 'id2' => 2]).'">'.__("Completed").'</a>
                            </div>
                          </div>';
                        })

                        ->addColumn('action', function(Invest $data) {
                            return '<div class="btn-group mb-1">
                            <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              '.'Actions' .'
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start">
                                <a href="' . route('admin.invests.show',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                            </div>
                          </div>';
                         })
                        ->rawColumns(['user_id','status','action'])
                        ->toJson();
    }

    public function index(){
        return view('admin.invest.invest_log');
    }

    public function investdetails($id)
    {
        $data = Invest::findOrFail($id);
        if($data->owner_type == 'user'){
            $data['owner'] = User::findOrFail($data->property_owner_id);
        }else{
            $data['owner'] = Admin::findOrFail($data->property_owner_id);
        }
        $data['data'] = $data;

        return view('admin.invest.details',$data);
    }

    public function status($id1,$id2){
        $data = Invest::findOrFail($id1);
        $user = User::whereId($data->user_id)->first();

        if($data->status == 2){
          $msg = 'Invest already completed';
          return response()->json($msg);
        }

        if($id2 == 2){
            $user->increment('interest_balance',$data->return_amount);
            $data->status = 2;
            $data->save();

            $trans = new Transaction();
            $trans->email = $user->email;
            $trans->amount = $data->return_amount;
            $trans->type = "Interest Money";
            $trans->profit = "plus";
            $trans->txnid = Str::random(12);
            $trans->user_id = $user->id;
            $trans->save();
        }

        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }
}
