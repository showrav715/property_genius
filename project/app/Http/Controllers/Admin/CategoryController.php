<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use Datatables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables(Request $request)
    {
         $datas = Category::orderBy('id','desc');

         return Datatables::of($datas)
                        ->addColumn('checkbox',function(Category $data){
                            return $checkbox = $data->id ? '<input type="checkbox" class="form-check-input m-0 p-0 columnCheck" value="'.$data->id.'">':'';
                        })
                        ->editColumn('created_at', function(Category $data){
                            return $data->created_at->toFormattedDateString();
                        })
                        ->editColumn('title', function(Category $data){
                            return $data = $data->parent_id != NULL ? $data->title.', '.$data->parent->title : $data->title;
                        })
                        ->addColumn('status', function(Category $data) {
                            $status      = $data->status == 1 ? __('Activated') : __('Deactivated');
                            $status_sign = $data->status == 1 ? 'success'   : 'danger';

                            return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.$status .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.categories.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Activate").'</a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.categories.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Deactivate").'</a>
                                        </div>
                                    </div>';
                        })

                        ->addColumn('action', function(Category $data) {
                              return '<div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.'Actions' .'
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start">
                                  <a href="' . route('admin.categories.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                  <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.categories.delete',$data->id).'">'.__("Delete").'</a>
                                </div>
                              </div>';
                        })
                        ->rawColumns(['checkbox','status','action'])
                        ->toJson();
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        $data['categories'] = Category::whereParentId(NULL)
                                        ->whereStatus(1)
                                        ->get();
        return view('admin.categories.create',$data);
    }

    public function store(Request $request)
    {
        $rules = [
            'title'=> 'required',
            'slug'=>'required|unique:categories|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $data = new Category();

        $input = $request->all();
        $input['slug'] = Str::slug($request->slug, '-');
        $data->fill($input)->save();

        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.categories.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data['data'] = Category::findOrFail($id);
        $data['categories'] = Category::where('title','!=',$data['data']->title)
                                        ->whereParentId(NULL)
                                        ->whereStatus(1)
                                        ->get();
        return view('admin.categories.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'photo'      => 'mimes:jpeg,jpg,png,svg',
            'title'=>'required',
            'slug' => 'required|unique:categories,slug,'.$id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Category::findOrFail($id);
        $input = $request->all();

        $input['slug'] = Str::slug($request->slug, '-');
        $data->update($input);

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.categories.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }


    public function status($id1,$id2)
    {
        $data = Category::findOrFail($id1);
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
        $data = Category::findOrFail($id);
        if($data->subcategories != NULL){
            foreach($data->subcategories as $key=>$subcategory){
                @unlink('assets/images/'.$subcategory->photo);
                $subcategory->delete();
            }
        }
        @unlink('assets/images/'.$data->photo);
        $data->delete();

        return true;
    }


}
