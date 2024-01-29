<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use Validator;

class CurrencyController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = Currency::orderBy('id','desc');
         return Datatables::of($datas)
                            ->addColumn('action', function(Currency $data) {

                                $delete = $data->is_default == 1 ? '':'<a href="javascript:;" data-href="' . route('admin.currency.delete',$data->id) . '" data-toggle="modal" data-target="#deleteModal" class="dropdown-item">'.__("Delete").'</a>';
                                $default = $data->is_default == 1 ? '<a href="javascript:;" class="dropdown-item"> '.__("Default").'</a>' : '<a class="status dropdown-item" href="javascript:;" data-href="' . route('admin.currency.status',['id1'=>$data->id,'id2'=>1]) . '">'.__('Set Default').'</a>';

                                return '<div class="btn-group mb-1">
                              <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.'Actions' .'
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start">
                                <a href="' . route('admin.currency.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>'.$delete.$default.'

                              </div>
                            </div>';
                            })
                            ->rawColumns(['action'])
                            ->toJson();
    }

    public function index()
    {
        return view('admin.currency.index');
    }

    public function create()
    {
        return view('admin.currency.create');
    }

    public function store(Request $request)
    {
        $data = new Currency();
        $input = $request->all();
        $isExist = Currency::where('is_default',1)->exists();
        $gs = Generalsetting::first();

        if(!$isExist){
            $input['is_default'] = 1;

            $gs->currency_code = $request->name;
            $gs->currency_sign = $request->sign;
            $gs->update();
        }
        $data->fill($input)->save();

        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.currency.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = Currency::findOrFail($id);
        return view('admin.currency.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Currency::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        if($data->is_default){
            $gs = Generalsetting::first();
            $gs->currency_code = $data->name;
            $gs->currency_sign = $data->sign;
            $gs->update();
        }

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.currency.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function status($id1,$id2)
    {
        $gs = Generalsetting::first();
        $data = Currency::findOrFail($id1);
        $data->is_default = $id2;
        $data->update();

        $gs->currency_code = $data->name;
        $gs->currency_sign = $data->sign;
        $gs->update();

        $data = Currency::where('id','!=',$id1)->update(['is_default' => 0]);

        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
    }

    public function destroy($id)
    {
        if($id == 1)
        {
            return __("You cant't remove the main currency.");
        }
        $data = Currency::findOrFail($id);
        if($data->is_default == 1) {
            Currency::where('id','=',1)->update(['is_default' => 1]);
        }
        if($data->methods){
            foreach ($data->methods as $key => $method) {
                @unlink('assets/images/'.$method->photo);
                $method->delete();
            }
        }
        $data->delete();

        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
    }

}
