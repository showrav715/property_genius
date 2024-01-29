<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\BuyRent;
use App\Models\User;
use Datatables;
use Illuminate\Support\Carbon;

class PropertyContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables(Request $request)
    {
        $datas = BuyRent::wherePropertyOwnerId(auth()->id())->whereType($request->type)->orderBy('id','desc')->get();

        return Datatables::of($datas)
                            ->addColumn('photo', function(BuyRent $data) {
                                $photo = $data->property->photo ? url('assets/images/'.$data->property->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->addColumn('name',function(BuyRent $data){
                                return $data->property != NULL ? $data->property->name : 'Property Deleted';
                            })
                            ->addColumn('user_id',function(BuyRent $data){
                                return $data->user != NULL ? $data->user->name : 'User Deleted';
                            })
                            ->editColumn('amount',function(BuyRent $data){
                                return showSignAmount($data->amount);
                            })
                            ->editColumn('status',function(BuyRent $data){
                                if($data->status == 0){
                                    return '<span class="badge bg-warning text-white">pending</span>';
                                }elseif($data->status == 1){
                                    return '<span class="badge bg-success text-white">approved</span>';
                                }elseif($data->status == 2){
                                    return '<span class="badge bg-secondary text-white">contract submission</span>';
                                }elseif($data->status == 3 && $data->phase == 5){
                                    return '<span class="badge bg-info text-white">client payment</span>';
                                }elseif($data->status == 3){
                                    return '<span class="badge bg-info text-white">contract submitted</span>';
                                }else{
                                    return '<span class="badge bg-danger text-white">rejected</span>';
                                }
                            })
                            ->editColumn('type', function(BuyRent $data){
                                if($data->type == 'for_rent'){
                                    if($data->rent_type == 'visit'){
                                        return '<div>
                                                    <span class="badge bg-info text-white">'.$data->rent_type.'</span>
                                                    <p>'.Carbon::parse($data->visit_date)->format('d M y ').' '.$data->schedule_time .'</p>
                                            </div>';
                                    }else{
                                        return '<span class="badge bg-info text-white">'.$data->rent_type.'</span>';
                                    }
                                }else{
                                    return '<span class="badge bg-info text-white">Sell</span>';
                                }
                            })

                            ->addColumn('action', function(BuyRent $data) {
                                return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.'Actions' .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item" href="'.  route('agent.property.contracts.details',$data->id).'">'.__("Details").'</a>
                                        </div>
                                    </div>';

                            })
                            ->rawColumns(['photo','name','type','status','action'])
                            ->toJson();
    }

    public function rents(){
        $this->seen('for_rent');
        return view('agent.contracts.rent');
    }

    public function sells(){
        $this->seen('for_buy');
        return view('agent.contracts.sell');
    }

    public function details($id){
        $data = BuyRent::findOrFail($id);
        $data['user'] = User::findOrFail($data->user_id);
        $data['requiredInformations'] = json_decode($data->required_information,true);
        $data['property'] = $data->property;
        $data['data'] = $data;

        return view('agent.contracts.details',$data);
    }

    public function contractPaper($id){
        $data = BuyRent::findOrFail($id);
        $data['property'] = $data->property;
        $data['data'] = $data;

        return view('agent.contracts.phase4',$data);
    }

    public function status($id1,$id2){
        $data = BuyRent::findOrFail($id1);
        if($data->status == 4){
          $msg = 'Already rejected!';
          return response()->json($msg);
        }

        $data->status = $id2;
        if($id2 == 2){
            $data->phase = 3;
        }else{
            $data->phase = 4;
        }

        $data->update();

        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function phase($id1,$id2){
        $data = BuyRent::findOrFail($id1);
        if($data->status == 4){
          $msg = 'Already rejected!';
          return response()->json($msg);
        }

        $data->phase = $id2;

        $data->update();

        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function seen($type){
        $buy_rents = BuyRent::whereView(0)->whereType($type)->get();
        foreach ($buy_rents as $key => $data) {
            $data->view = 1;
            $data->save();
        }
        return;
    }
}
