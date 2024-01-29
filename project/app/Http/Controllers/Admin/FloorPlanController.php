<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FloorPlan;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FloorPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables($pid)
    {
         $datas = FloorPlan::wherePropertyId($pid)->orderBy('id','desc');

         return Datatables::of($datas)
                            ->editColumn('photo', function(FloorPlan $data) {
                                $photo = $data->photo ? url('assets/images/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })

                            ->addColumn('action', function(FloorPlan $data) {

                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.floor.plan.edit',[$data->id,$data->property_id]) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.floor.plan.edit',[$data->id,$data->property_id]).'">'.__("Delete").'</a>
                                </div>
                              </div>';

                            })
                            ->rawColumns(['photo','action'])
                            ->toJson();
    }

    public function index($pid)
    {
        return view('admin.floorplans.index',compact('pid'));
    }

    public function create($pid)
    {
        return view('admin.floorplans.create',compact('pid'));
    }


    public function store(Request $request, $pid)
    {
        $rules = [
            'photo'=> 'required|mimes:jpeg,jpg,png,svg',
            'name'=>'required',
            'size'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new FloorPlan();
        $input = $request->all();

        if ($file = $request->file('photo'))
         {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            $input['photo'] = $name;
        }

        $data->fill($input)->save();

        $msg = 'New Data Added Successfully.'.'<a href="'.route("admin.floor.plan.index",$pid).'">View Lists</a>';
        return response()->json($msg);
    }


    public function edit($id,$pid)
    {
        $data = FloorPlan::findOrFail($id);
        return view('admin.floorplans.edit',compact('data','pid'));
    }


    public function update(Request $request, $id,$pid)
    {
        $rules = [
            'photo'=> 'mimes:jpeg,jpg,png,svg',
            'name'=>'required',
            'size'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = FloorPlan::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            @unlink('assets/images/'.$data->photo);
            $input['photo'] = $name;
        }

        $data->update($input);

        $msg = 'Data Updated Successfully.'.'<a href="'.route("admin.floor.plan.index",$pid).'">View Lists</a>';
        return response()->json($msg);
    }

    public function destroy($id)
    {
        $data = FloorPlan::findOrFail($id);
        @unlink('assets/images/'.$data->photo);
        $data->delete();


        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }
}
