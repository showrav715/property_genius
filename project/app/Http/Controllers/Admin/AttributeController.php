<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use Datatables;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables(Request $request)
    {
         $datas = Attribute::orderBy('id','desc');

         return Datatables::of($datas)
                        ->addColumn('checkbox',function(Attribute $data){
                            return $checkbox = $data->id ? '<input type="checkbox" class="form-check-input m-0 p-0 columnCheck" value="'.$data->id.'">':'';
                        })
                        ->addColumn('status', function(Attribute $data) {
                            $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                            $status_sign = $data->status == 1 ? 'success'   : 'danger';

                            return '<div class="btn-group mb-1">
                            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            '.$status .'
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start">
                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.attributes.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.attributes.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                            </div>
                        </div>';

                        })

                        ->addColumn('action', function(Attribute $data) {
                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.attributeoptions.index',$data->name) . '"  class="dropdown-item">'.__("Options").'</a>
                                  <a href="' . route('admin.attributes.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.attributes.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
                        })
                        ->rawColumns(['checkbox','status','action'])
                        ->toJson();
    }

    public function index()
    {
        return view('admin.attributes.index');
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|unique:attributes|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Attribute();

        $input = $request->all();
        $data->fill($input)->save();

        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.attributes.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = Attribute::findOrFail($id);
        return view('admin.attributes.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:attributes,name,'.$id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Attribute::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.attributes.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }


    public function status($id1,$id2)
    {
        $data = Attribute::findOrFail($id1);
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
        $data = Attribute::findOrFail($id);
        if($data->options){
            foreach ($data->options as $key => $option) {
               $option->delete();
            }
        }
        $data->delete();

        return true;
    }
}
