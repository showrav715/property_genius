<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class AgentVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
         $datas = User::whereIn('is_agent', [1,2,3])->orderBy('id','desc');

         return Datatables::of($datas)
                            ->addColumn('action', function(User $data) {
                                return '<div class="btn-group mb-1">
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    '.'Actions' .'
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start">
                                    <a href="' . route('admin-user-show',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                                    <a href="' . route('admin-user-edit',$data->id) . '" class="dropdown-item" >'.__("Edit").'</a>
                                    <a href="javascript:;" class="dropdown-item send" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform">'.__("Send").'</a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin-user-delete',$data->id).'">'.__("Delete").'</a>
                                    </div>
                                </div>';
                            })

                            ->addColumn('status', function(User $data) {
                                $status      = $data->is_agent === 1 ? __('Pending') : ($data->is_agent == 2 ? __('Approve') : __('Reject'));
                                $status_sign = $data->is_agent === 1 ? 'warning'   : ($data->is_agent == 2 ? __('success') : __('danger'));

                                    return '<div class="btn-group mb-1">
                                    <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.$status .'
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start">
                                        <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.agent.verification.status',['id1' => $data->id, 'id2' => 2]).'">'.__("Approve").'</a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.agent.verification.status',['id1' => $data->id, 'id2' => 3]).'">'.__("Reject").'</a>
                                    </div>
                                    </div>';
                            })
                            ->rawColumns(['action','status'])
                            ->toJson();
    }

    public function index()
    {
        return view('admin.agents.index');
    }

    public function status($id1,$id2)
    {
        $user = User::findOrFail($id1);

        if($user->is_agent === 2){
            $msg = __('Already approve to this agent!');
            return response()->json($msg);
        }

        if($user->is_agent === 3){
            $msg = __('Already rejected to this agent!');
            return response()->json($msg);
        }

        $user->is_agent = $id2;

        $user->update();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }
}
