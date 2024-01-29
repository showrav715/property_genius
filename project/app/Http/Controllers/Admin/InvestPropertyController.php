<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Generalsetting;
use App\Models\Location;
use App\Models\Property;
use App\Models\User;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InvestPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
        $datas = Property::whereIsInvest(1)->orderBy('id','desc');

        return Datatables::of($datas)
                            ->editColumn('photo', function(Property $data) {
                                $photo = $data->photo ? url('assets/images/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->editColumn('price', function(Property $data) {
                                return showAdminAmount($data->price);
                            })
                            ->editColumn('invest_amount', function(Property $data) {
                                return showAdminAmount($data->invest_amount);
                            })
                            ->editColumn('min_invest', function(Property $data) {
                                return showAdminAmount($data->min_invest);
                            })
                            ->editColumn('max_invest', function(Property $data) {
                                return showAdminAmount($data->max_invest);
                            })
                            ->editColumn('type', function(Property $data){
                                if($data->type == 'for_rent'){
                                    return '<span class="badge bg-info text-white">Rent</span>';
                                }else{
                                    return '<span class="badge bg-info text-white">Sell</span>';
                                }
                            })
                            ->editColumn('status', function(Property $data) {
                                $status      = $data->status == 1 ? __('Approved') : __('Pending');
                                $status_sign = $data->status == 1 ? 'success'   : 'danger';

                                return '<div class="btn-group mb-1">
                                            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            '.$status .'
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start">
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.properties.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Approved").'</a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.properties.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Pending").'</a>
                                            </div>
                                        </div>';
                            })
                            ->addColumn('action', function(Property $data) {

                              return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.'Actions' .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a href="' . route('admin.invest.properties.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.invest.properties.delete',$data->id).'">'.__("Delete").'</a>
                                        </div>
                                    </div>';

                            })
                            ->rawColumns(['photo','type','status','action'])
                            ->toJson();
    }

    public function index(){
        return view('admin.invest.index');
    }

    public function create(){
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();

        return view('admin.invest.create',$data);
    }

    public function store(Request $request){
        $rules = [
            'photo' => 'required|mimes:jpeg,jpg,png,svg',
            'name'=>'required',
            'slug'=>'required|unique:properties|max:255',
            'location_id'=>'required',
            'category_id'=>'required',
            'type'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Property();
        $input = $request->all();

        if($input['photo']){
            $status = ExtensionValidation($input['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            $input['photo'] = handleMakeImage($input['photo']);
        }

        $input['is_invest'] = 1;
        $input['invest_amount'] = 0;
        $input['slug']=Str::slug($request->slug);
        $input['attributes'] = $request->has('attributes') ? json_encode($input['attributes'],true) : NULL;
        $data->fill($input)->save();

        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                $gallery = new Gallery();

                if($file){
                    $status = ExtensionValidation($file);
                    if(!$status){
                        return ['errors' => [0=>'file format not supported']];
                    }
                    $gallery['photo'] = handleMakeImage($file);
                }
                $gallery['property_id'] = $data->id;
                $gallery->save();
            }
        }
        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.invest.properties.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id){
        $data['data'] = Property::findOrFail($id);
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();
        $data['data_attributes'] = $data['data']->attributes != NULL ? json_decode($data['data']->attributes,true) : [];

        return view('admin.invest.edit',$data);
    }

    public function update(Request $request, $id){
        $rules = [
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'name'=>'required',
            'slug'=>'required|max:255|unique:properties,slug,'.$id,
            'location_id'=>'required',
            'category_id'=>'required',
            'type'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Property::findOrFail($id);
        $input = $request->all();

        if(isset($input['photo'])){
            $status = ExtensionValidation($input['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            $input['photo'] = handleUpdateImage($input['photo'],$data->photo);
        }

        if($request->type == 'for_rent'){
            $input['payment_duration'] = $request->payment_duration;
        }else{
            $input['payment_duration'] = NULL;
        }

        $input['slug']=Str::slug($request->slug);
        $input['attributes'] = $request->has('attributes') ? json_encode($input['attributes'],true) : NULL;
        $data->update($input);

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.invest.properties.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function status($id1,$id2)
    {
        $data = Property::findOrFail($id1);
        $data->status = $id2;
        $data->update();

        $gs = Generalsetting::findOrFail(1);
        $user = User::findOrFail($data->user_id);
        $admin = auth()->guard('admin')->user();

        if($user){
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $user->email,
                    'type' => "property approve",
                    'cname' => $user->name,
                    'oamount' => $data->price,
                    'aname' => $admin->name,
                    'aemail' => $admin->email,
                    'wtitle' => "",
                ];

                $mailer = new GeniusMailer();
                $mailer->sendAutoMail($data);
            }
            else
            {
                $to = $user->email;
                $subject = " Your property approved successfully.";
                $msg = "Hello ".$user->name."!\nYour property approve by".$admin->name. " successfully.\nThank you.";
                $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
                mail($to,$subject,$msg,$headers);
            }
        }

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
        $data = Property::findOrFail($id);
        @unlink('assets/images/'.$data->photo);
        $data->delete();

        return true;
    }
}
