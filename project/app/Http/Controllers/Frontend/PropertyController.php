<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Location;
use App\Models\Plan;
use App\Models\Property;
use App\Models\PropertyReview;
use App\Models\User;
use App\Models\Wishlists;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function listing(Request $request)
    {
        $name = $request->name ? $request->name : null;
        $category_id = $request->category_id ? $request->category_id : null;
        $location = $request->location_id ? $request->location_id : null;
        $type = $request->type ? $request->type : null;
        $bed = $request->bed ? $request->bed : null;
        $bathroom = $request->bathroom ? $request->bathroom : null;
        $minprice = $request->min ? $request->min : null;
        $maxprice = $request->max ? $request->max : null;
        $shorty = $request->shorty ? $request->shorty : null;

        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations']  = Location::whereStatus(1)->orderBy('id','desc')->get();

        $data['properties'] = Property::when($name, function ($q) use ($name) {
                                            return $q->where('name', 'LIKE', "%$name%");
                                        })
                                        ->when($category_id, function($query,$category_id){
                                            $query->where('category_id',$category_id);
                                        })
                                        ->when($location, function ($q) use ($location) {
                                            return $q->whereLocationId($location);
                                        })
                                        ->when($type, function ($q) use ($type) {
                                            return $q->where('type', 'LIKE', "%$type%");
                                        })
                                        ->when($bed, function ($q) use ($bed) {
                                            return $q->where('bed', $bed);
                                        })
                                        ->when($bathroom, function ($q) use ($bathroom) {
                                            return $q->where('bathroom', $bathroom);
                                        })
                                        ->when($shorty, function ($q) use ($shorty) {
                                            if($shorty == 'low'){
                                                return $q->orderBy('price', 'asc');
                                            }else{
                                                return $q->orderBy('price', 'desc');
                                            }
                                        })
                                        ->when($minprice, function($query, $minprice) {
                                            return $query->where('price', '>=', $minprice);
                                        })
                                        ->when($maxprice, function($query, $maxprice) {
                                            return $query->where('price', '<=', $maxprice);
                                        })
                                        ->whereIsInvest(0)
                                        ->whereStatus(1)
                                        ->orderBy('id', 'desc')
                                        ->paginate(5);

        return view('frontend.list', $data);
    }

    public function create()
    {
        $user = auth()->user();

        if($user === null){
            return redirect()->route('user.login')->with('warning', 'Please login first!');
        }

        if($user->plan_id == NULL && $user->status != 2){
            if($user->ad_limit == 0){
                $data['plans'] = Plan::whereStatus(1)->orderBy('id','desc')->get();
                return view('frontend.plan',$data);
            }
        }
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['attributes'] = Attribute::whereStatus(1)->orderBy('id','desc')->get();

        return view('frontend.submitproperty',$data);
    }

    public function wishlist(Request $request)
    {
        $user = auth()->user();
        if($user == NULL){
            return response()->json(['error'=>'Please login first!']);
        }

        if(Wishlists::whereUserId(auth()->id())->wherePropertyId($request->property_id)->exists()){
            $wishlist = Wishlists::whereUserId(auth()->id())->wherePropertyId($request->property_id)->first();
            $wishlist->delete();
            return response()->json(['error'=>'Directory remove from favourite list']);
        }

        $wishlist = new Wishlists();
        $wishlist->user_id = auth()->id();
        $wishlist->property_id = $request->property_id;
        $wishlist->save();

        return response()->json(['success'=>'Property added into your favourite list.']);
    }

    public function propertyDetails($slug)
    {
        $data = Property::whereSlug($slug)->whereStatus(1)->first();

        if(PropertyReview::wherePropertyId($data->id)->get()){
            $data['reviews'] = PropertyReview::wherePropertyId($data->id)->whereStatus(1)->get();
        }

        $data['featured_properties'] = Property::whereStatus(1)
                                                ->whereIsInvest(0)
                                                ->whereIsFeature(1)
                                                ->orderBy('id','desc')
                                                ->limit(8)
                                                ->get();
        $data['data'] = $data;

        if($data){
            return view('frontend.property_details',$data);
        }else{
            return view('errors.404');
        }
    }

    public function agents(Request $request)
    {
        $name = $request->agent ? $request->agent : null;

        $data ['agents'] = User::when($name, function ($q) use ($name) {
                                    return $q->where('name', 'LIKE', "%$name%");
                                })
                                ->whereIsAgent(2)
                                ->get();

        return view('frontend.agents',$data);
    }

    public function agentDetails($username)
    {
        $agent = User::whereUsername($username)->first();
        $data['agent'] = $agent;
        $data['rent_properties'] = $agent->properties()->whereType('for_rent')->orderBy('id','desc')->paginate(10);
        $data['buy_properties'] = $agent->properties()->whereType('for_buy')->orderBy('id','desc')->paginate(10);
        $data['featured_properties'] = $agent->properties()->whereStatus(1)->whereIsFeature(1)->orderBy('id','desc')->limit(4)->get();

        return view('frontend.agentdetails',$data);
    }
}
