<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Validator;

class AttributeOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables(Request $request,$id)
    {
         $attribute = Attribute::findOrFail($id);
         $datas = $attribute->options;

         return Datatables::of($datas)
                        ->addColumn('checkbox',function(AttributeOption $data){
                            return $checkbox = $data->id ? '<input type="checkbox" class="form-check-input m-0 p-0 columnCheck" value="'.$data->id.'">':'';
                        })
                        ->editColumn('attribute_id', function(AttributeOption $data) {
                            return $attribute = $data->attribute != NULL ? $data->attribute->name : 'Attribute Deleted';
                        })
                        ->addColumn('status', function(AttributeOption $data) {
                            $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                            $status_sign = $data->status == 1 ? 'success'   : 'danger';

                            return '<div class="btn-group mb-1">
                            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            '.$status .'
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start">
                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.attributeoptions.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.attributeoptions.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                            </div>
                        </div>';

                        })

                        ->addColumn('action', function(AttributeOption $data) {
                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.attributeoptions.edit',[$data->attribute->name,$data->id]) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.attributeoptions.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
                        })
                        ->rawColumns(['checkbox','attribute_id','status','action'])
                        ->toJson();
    }

    public function index($name)
    {
        $data['data'] = Attribute::whereName($name)->first();
        return view('admin.attributeoptions.index',$data);
    }

    public function create($name)
    {
        $data['data'] = Attribute::whereName($name)->first();
        return view('admin.attributeoptions.create',$data);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|unique:attribute_options|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new AttributeOption();

        $input = $request->all();
        $data->fill($input)->save();

        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.attributeoptions.index',$data->attribute->name).'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($name,$id)
    {
        $data = AttributeOption::findOrFail($id);
        return view('admin.attributeoptions.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:attribute_options,name,'.$id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = AttributeOption::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.attributeoptions.index',$data->attribute->name).'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }


    public function status($id1,$id2)
    {
        $data = AttributeOption::findOrFail($id1);
        $data->status = $id2;
        $data->update();

        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function bulkdelete(Request $request){
        $ids = $request->bulk_id;
        $bulk_ids = explode(",",$ids);
        foreach($bulk_ids as $key=>$id){
            if($id){
                try {
                    $this->delete($id);
                    $msg = 'Data Deleted Successfully.';
                } catch (\Throwable $th) {
                    $msg = 'Something went wrong.';
                }
            }
        }
        return response()->json($msg);
    }

    public function destroy($id)
    {
        try {
            $this->delete($id);
            $msg = 'Data Deleted Successfully.';
        } catch (\Throwable $th) {
            $msg = 'Something went wrong.';
        }
        return response()->json($msg);
    }

    public function delete($id){
        $data = AttributeOption::findOrFail($id);
        $data->delete();

        return true;
    }
}
