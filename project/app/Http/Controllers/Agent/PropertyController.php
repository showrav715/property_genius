<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\DynamicForm;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Property;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Datatables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables(Request $request)
    {
        if($request->status != 'all'){
            $datas = Property::whereUserId(auth()->id())
                                ->whereStatus($request->status)
                                ->whereIsInvest(0)
                                ->where('type','!=','for_campaign')
                                ->orderBy('id','desc');
        }else{
            $datas = Property::whereUserId(auth()->id())
                                ->whereIsInvest(0)
                                ->where('type','!=','for_campaign')
                                ->orderBy('id','desc');
        }

        return Datatables::of($datas)
                            ->editColumn('photo', function(Property $data) {
                                $photo = $data->photo ? url('assets/images/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->editColumn('category_id',function(Property $data){
                                return $data->category != NULL ? $data->category->title : 'Category Deleted';
                            })
                            ->editColumn('location_id',function(Property $data){
                                return $data->location != NULL ? $data->location->name : 'Location Deleted';
                            })
                            ->editColumn('status',function(Property $data){
                                if($data->status == 0){
                                    return '<span class="badge bg-warning text-white">Pending</span>';
                                }else{
                                    return '<span class="badge bg-success text-white">Approve</span>';
                                }
                            })
                            ->addColumn('extra_info', function(Property $data){
                                $bed = '<span class="badge bg-info text-white">Bed : '.$data->bed.'</span>';
                                $bathroom = '<span class="badge bg-primary ml-1 text-white">Bathroom : '.$data->bathroom.'</span>';
                                $square = '<span class="badge bg-warning ml-1 text-white">Square : '.$data->square.' Sq Ft</span>';
                                $garage = '<span class="badge bg-info ml-1 text-white">Garage : '.$data->garage.'</span>';
                                $year_built = '<span class="badge bg-success ml-1 text-white">Built Year : '.$data->year_built.'</span>';

                                return $bed.$bathroom.$square.$garage.$year_built;
                            })
                            ->editColumn('type', function(Property $data){
                                if($data->type == 'for_rent'){
                                    return '<span class="badge bg-info text-white">Rent</span>';
                                }else{
                                    return '<span class="badge bg-info text-white">Sell</span>';
                                }
                            })


                            ->addColumn('action', function(Property $data) {

                              return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.'Actions' .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a href="' . route('agent.properties.edit',$data->id) . '"  class="dropdown-item">'.__("Edit").'</a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('agent.properties.delete',$data->id).'">'.__("Delete").'</a>
                                        </div>
                                    </div>';

                            })
                            ->rawColumns(['photo','type','status','extra_info','action'])
                            ->toJson();
    }

    public function index(){
        return view('agent.properties.index');
    }

    public function pending(){
        return view('agent.properties.pending');
    }

    public function approved(){
        return view('agent.properties.approved');
    }

    public function create(){
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();

        return view('agent.properties.create',$data);
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

        $user = auth()->user();
        if($user->ad_limit>0){

            $data = new Property();
            $input = $request->all();

            if($input['photo']){
                $status = ExtensionValidation($input['photo']);
                if(!$status){
                    return redirect()->back()->with('message','file format not supported');
                }
                $input['photo'] = handleMakeImage($input['photo']);
            }

            $input['status'] = 0;
            $input['user_id'] = auth()->id();
            $input['slug']=Str::slug($request->slug);
            $input['attributes'] = json_encode($input['attributes'],true);
            if(auth()->user()->plan){
                $input['expire_date	'] = Carbon::now()->addDays(auth()->user()->plan->post_duration);
            }
            $data->fill($input)->save();

            if ($files = $request->file('gallery')){
                foreach ($files as  $key => $file){
                    $gallery = new Gallery();

                    if($file){
                        $status = ExtensionValidation($file);
                        if(!$status){
                            return redirect()->back()->with('message','file format not supported');
                        }
                        $gallery['photo'] = handleMakeImage($file);
                    }
                    $gallery['property_id'] = $data->id;
                    $gallery->save();
                }
            }

            $user->ad_limit -= 1;
            $user->update();

            $msg = __('New Data Added Successfully.').' '.'<a href="'.route('agent.properties.index').'"> '.__('View Lists.').'</a>';
            return response()->json($msg);
        }else{
            return response()->json('You have 0 ad limit, please renew your plan or enroll another package');
        }

    }

    public function edit($id){
        $data['data'] = Property::findOrFail($id);
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();
        $data['data_attributes'] = $data['data']->attributes != NULL ? json_decode($data['data']->attributes,true) : [];

        return view('agent.properties.edit',$data);
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
                return redirect()->back()->with('message','file format not supported');
            }
            $input['photo'] = handleUpdateImage($input['photo'],$data->photo);
        }

        $input['slug']=Str::slug($request->slug);
        $input['attributes'] = json_encode($input['attributes'],true);
        $data->update($input);

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('agent.properties.index').'"> '.__('View Lists.').'</a>';
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
