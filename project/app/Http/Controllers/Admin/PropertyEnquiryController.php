<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyEnquiry;
use Illuminate\Http\Request;
use Datatables;

class PropertyEnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = PropertyEnquiry::orderBy('id','desc');

        return Datatables::of($datas)
                        ->editColumn('created_at', function(PropertyEnquiry $data) {
                            $date = date('d-m-Y',strtotime($data->created_at));
                            return $date;
                        })
                        ->editColumn('property_id',function(PropertyEnquiry $data){
                            return $data->property != NULL ? $data->property->name : __('Propery deleted');
                        })
                        ->rawColumns([''])
                        ->toJson();
    }

    public function index(){
        return view('admin.enquiries.index');
    }
}
