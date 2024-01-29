<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BuyRent;
use App\Models\DynamicForm;
use App\Models\Property;
use App\Models\PropertyEnquiry;
use App\Models\PropertyReview;
use App\Models\Schedule;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDF;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function favorite(){
        $data['wishlists'] = auth()->user()->wishlists;
        return view('user.properties.favorite',$data);
    }

    public function favoriteDelete($id){
        Wishlists::whereId($id)->delete();
        return back()->with('message','Data Deleted Successfully');
    }

    public function propertyBuyRents(){
        $data['buy_rents'] = BuyRent::whereUserId(auth()->id())->orderBy('id','desc')->paginate(10);
        return view('user.properties.buy_rents',$data);
    }

    public function buyrent($slug){
        $data['property'] = Property::whereSlug($slug)->first();

        if(auth()->id() == $data['property']->user_id){
            return redirect()->route('front.property.details',$slug)->with('warning','You can not buy/rent own property!');
        }
        $data['requirementForms'] = DynamicForm::whereUserId($data['property']->user_id)->whereFormType('buy_sell')->get();
        if($data['property']->user_id == NULL){
            $data['schedule'] = Schedule::whereUserId($data['property']->user_id)->first();
        }else{
            $data['schedule'] = Schedule::whereUserId(0)->first();
        }

        return view('frontend.propertyform',$data);
    }

    public function store(Request $request){
        $rules = [
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


        $user = auth()->user();
        if($user->plan_id != NULL && $user->status == 2){
            if($user->ad_limit>0){
                $data = new Property();
                $input = $request->all();

                if(isset($input['photo'])){
                    $status = ExtensionValidation($input['photo']);
                    if(!$status){
                        return ['errors' => [0=>'file format not supported']];
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

                if($request->has('gallery')){
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
                }
                $user->ad_limit -= 1;
                $user->update();

                $msg = __('New Data Added Successfully.').' '.'<a href="'.route('agent.properties.index').'"> '.__('View Lists.').'</a>';
                return response()->json($msg);

            }else{
                return response()->json('You have 0 ad limit, please renew your plan or enroll another package');
            }
        }else{
            return response()->json('You need to be an agent to add property.');
        }
    }

    public function buyrentSubmit(Request $request){
        $property = Property::findOrFail($request->property_id);

        $requirementFields = DynamicForm::whereUserId($property->user_id)->whereFormType('buy_sell')->get();

        if(count($requirementFields) === 0){
            return back()->with('warning','Something went wrong please contact with agent!');
        }


        if($request->rent_type == 'visit'){
            $visit_time = Carbon::createFromFormat('Y-d-m',$request->visit_date);

            $now = Carbon::now()->millisecond(0);
            if($now->gt($visit_time)){
                return back()->with('warning','Please select current date or higher');
            }
        }


        $requireInformations = [];
        if($requirementFields){
            foreach(json_decode($requirementFields) as $key=>$value){
                if(($value->type == 1 || $value->type == 3) && $value->required == 1){
                    $request->validate([
                        $value->name => 'required'
                    ]);

                    $requireInformations['text'][$key] = str_replace(' ', '_', $value->name);
                }

                if($value->type == 2 && $value->required == 1){
                    $request->validate([
                        $value->name => 'required|mimes:jpeg,jpg,png,svg'
                    ]);

                    $requireInformations['file'][$key] = str_replace(' ', '_', $value->name);
                }
            }
        }

        if($request->rent_type == 'visit'){
            $request->validate([
                'visit_date' => 'required',
                'schedule_time' => 'required',
            ]);
        }

        $scheduleTime = BuyRent::wherePropertyOwnerId($property->user_id)
                                ->whereType('for_rent')
                                ->whereVisitDate(now()->format('m-d-Y'))
                                ->whereScheduleTime($request->schedule_time)
                                ->exists();
        if($scheduleTime){
            return back()->with('warning','Schedule already taken for this time!');
        }

        $data = new BuyRent();

        $data->transaction_no = Str::random(12);
        $data->user_id = auth()->id();
        $data->property_owner_id = $property->user_id;
        $data->property_id = $property->id;
        $data->amount = $property->price;
        $data->type = $property->type;

        if($request->rent_type == 'visit'){
            $data->visit_date = Carbon::createFromFormat('Y-d-m',$request->visit_date)->toDateTimeString();
            $data->schedule_time = $request->schedule_time;
        }
        $data->rent_type = $request->rent_type;

        if($property->type == 'for_rent'){
            $data->guarantee_amount = $property->guarantee_amount;
            $data->rent_duration = 'monthly';
            $data->next_rent_time = now()->addDays(30);
            $data->phase = 2;
            $data->status = 0;
        }else{
            $data->phase = 2;
            $data->status = 0;
        }

        $details = [];
        foreach($requireInformations as $key=>$infos){
            foreach($infos as $index=>$info){

                if($request->has($info)){
                    if($request->hasFile($info)){
                        if ($file = $request->file($info))
                        {
                           $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
                           $file->move('assets/images',$name);
                           $details[$info] = [$name,$key];
                        }
                    }else{
                        $details[$info] = [$request->$info,$key];
                    }
                }
            }
        }

        if(!empty($details)){
            $data->required_information = json_encode($details,true);
        }

        $data->save();

        return redirect()->route('front.property.details',$property->slug)->with('message','Data submitted to property agents.');
    }

    public function success(){
        return view('frontend.success');
    }

    public function buyRentDetails($id){
        $data = BuyRent::findOrFail($id);
        $data['requiredInformations'] = json_decode($data->required_information,true);
        $data['property'] = $data->property;
        $data['data'] = $data;

        return view('user.properties.details',$data);
    }

    public function contracts($id){
        $data = BuyRent::findOrFail($id);
        $data['requiredInformations'] = json_decode($data->required_information,true);
        $data['property'] = $data->property;
        $data['data'] = $data;


        $pdf = PDF::loadView('user.properties.contract', $data);
        $pdfName = Str::random(12).'.pdf';

        return $pdf->download($pdfName);
    }

    public function contractSubmit(Request $request){
        $data = BuyRent::findOrFail($request->buy_rent_id);
        if ($file = $request->file('contract_paper'))
        {
           $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
           $file->move('assets/images',$name);
           $data->contract_paper = $name;
        }

        $data->status = 3;
        $data->phase = 4;
        $data->save();

        return back()->with('message','Data submitted to property agents.');
    }

    public function review(Request $request){
        $request->validate([
            'rate' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        if(Property::whereUserId(auth()->id())->whereId($request->property_id)->exists()){
            return back()->with('warning','You are not allow to give review own property!');
        }

        if(PropertyReview::whereUserId(auth()->id())->wherePropertyId($request->property_id)->exists()){
            return back()->with('warning','you have given review already!');
        }

        if(!BuyRent::wherePropertyId($request->property_id)->whereUserId(auth()->id())->exists()){
            return back()->with('warning','You need to buy/rent before review!');
        }

        $property = Property::findOrFail($request->property_id);

        $review = new PropertyReview();
        $review->property_owner_id = $property->user_id ? $property->user_id : $property->admin_id;
        $review->owner_type = $property->user_id ? 'user' : 'admin';
        $review->user_id = $request->user_id;
        $review->property_id = $request->property_id;
        $review->title = $request->title;
        $review->message = $request->message;
        $review->rate = $request->rate;
        $review->status = 1;
        $review->save();

        return back()->with('message','Data submitted for admin to review.');
    }

    public function enquiry(Request $request){
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'details' => 'required',
        ]);

        if(!auth()->user()){
            return redirect()->route('user.login')->with('warning','Login First!');
        }

        $property = Property::whereId($request->property_id)->first();

        if($request->has('user_id')){
            if($property->user_id == auth()->id()){
                return back()->with('warning','You are the owner of this property!');
            }
        }


        $data = new PropertyEnquiry();
        $data->user_id = auth()->id();
        $data->property_id = $request->property_id;
        if($request->has('admin_id')){
            $data->property_owner_id = 0;
        }else{
            $data->property_owner_id = $request->user_id;
        }
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->details = $request->details;
        $data->save();

        return back()->with('message','Thank you for contacting us! We will get back to you soon');
    }
}
