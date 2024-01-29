<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyReview;
use Datatables;
use Illuminate\Http\Request;

class PropertyReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = PropertyReview::orderBy('id','desc');

        return Datatables::of($datas)
                            ->editColumn('created_at',function(PropertyReview $data){
                                return $data->created_at->format('d-m-Y h:i');
                            })
                            ->addColumn('author',function(PropertyReview $data) {
                                return $data->property->user != NULL ? $data->property->user->email : 'Customer Deleted';
                            })
                            ->editColumn('property_id',function(PropertyReview $data){
                                return '<a href="'.route('front.property.details',$data->property->slug).'">'.$data->property->name.'</a>';
                            })
                            ->editColumn('status', function(PropertyReview $data) {
                                if($data->status == 0){
                                    $status = __('Pending');
                                    $status_sign = 'warning';
                                }elseif($data->status == 1){
                                    $status = __('Approved');
                                    $status_sign = 'success';
                                }else{
                                    $status = __('Rejected');
                                    $status_sign = 'danger';
                                }

                                return '<div class="btn-group mb-1">
                                            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            '.$status .'
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start">
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.property.review.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Approved").'</a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.property.review.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Pending").'</a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.property.review.status',['id1' => $data->id, 'id2' => 2]).'">'.__("Reject").'</a>
                                            </div>
                                        </div>';
                            })
                            ->rawColumns(['property_id','status'])
                            ->toJson();
    }

    public function index(){
        $this->seen();
        return view('admin.propertyreview.index');
    }

    public function status($id1,$id2)
    {
        $data = PropertyReview::findOrFail($id1);
        if($data->status == 2){
            return response()->json('Review was rejected!');
        }
        $data->status = $id2;
        $data->update();


        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function seen(){
        $reviews = PropertyReview::whereView(0)->get();
        foreach ($reviews as $key => $review) {
            $review->view = 1;
            $review->save();
        }
        return;
    }
}
