<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\DynamicForm;
use App\Models\Gallery;
use App\Models\Generalsetting;
use App\Models\Location;
use App\Models\Property;
use App\Models\Schedule;
use App\Models\User;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InvestPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $datas = Property::whereUserId(auth()->id())->whereIsInvest(1)->orderBy('id','desc');

        return Datatables::of($datas)
                            ->editColumn('photo', function(Property $data) {
                                $photo = $data->photo ? url('assets/images/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->editColumn('price', function(Property $data) {
                                return showNameAmount($data->price);
                            })
                            ->editColumn('invest_amount', function(Property $data) {
                                return showNameAmount($data->invest_amount);
                            })
                            ->editColumn('min_invest', function(Property $data) {
                                return showNameAmount($data->min_invest);
                            })
                            ->editColumn('max_invest', function(Property $data) {
                                return showNameAmount($data->max_invest);
                            })
                            ->editColumn('type', function(Property $data){
                                if($data->type == 'for_rent'){
                                    return '<span class="badge bg-info text-white">Rent</span>';
                                }else{
                                    return '<span class="badge bg-info text-white">Sell</span>';
                                }
                            })
                            ->editColumn('status',function(Property $data){
                                if($data->status == 0){
                                    return '<span class="badge bg-warning text-white">Pending</span>';
                                }else{
                                    return '<span class="badge bg-success text-white">Approve</span>';
                                }
                            })
                            ->addColumn('action', function(Property $data) {

                              return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.'Actions' .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a href="' . route('agent.invest.properties.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('agent.invest.properties.delete',$data->id).'">'.__("Delete").'</a>
                                        </div>
                                    </div>';

                            })
                            ->rawColumns(['photo','type','status','action'])
                            ->toJson();
    }

    public function index(){
        return view('agent.invest.index');
    }

    public function create(){
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();

        return view('agent.invest.create',$data);
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

        if(!Schedule::whereUserId(auth()->id())->exists()){
            return response()->json(array('errors' => ['Please add schedule time first!']));
        }

        if(Schedule::whereUserId(auth()->id())->first()->times == NULL){
            return response()->json(array('errors' => ['Please add schedule time first!']));
        }

        if(!DynamicForm::whereUserId(auth()->id())->exists()){
            return response()->json(array('errors' => ['Please add client buy/sell form first!']));
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

        $input['user_id'] = auth()->id();
        $input['is_invest'] = 1;
        $input['invest_amount'] = 0;
        $input['slug']=Str::slug($request->slug);
        $input['attributes'] = $request->has('attributes') ? json_encode($input['attributes'],true) : NULL;
        $input['status'] = 0;
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
        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('agent.invest.properties.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id){
        $data['data'] = Property::findOrFail($id);
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();
        $data['data_attributes'] = $data['data']->attributes != NULL ? json_decode($data['data']->attributes,true) : [];

        return view('agent.invest.edit',$data);
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

        if(!Schedule::whereUserId(auth()->id())->exists()){
            return response()->json(array('errors' => ['Please add schedule time first!']));
        }

        if(Schedule::whereUserId(auth()->id())->first()->times == NULL){
            return response()->json(array('errors' => ['Please add schedule time first!']));
        }

        if(!DynamicForm::whereUserId(auth()->id())->exists()){
            return response()->json(array('errors' => ['Please add client buy/sell form first!']));
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

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('agent.invest.properties.index').'"> '.__('View Lists.').'</a>';
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

    public function destroy($id)
    {
        $data = Property::findOrFail($id);
        @unlink('assets/images/'.$data->photo);
        $data->delete();

        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }
}
