<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class InvestController extends Controller
{
    public function invests(Request $request){
        $name = $request->name ? $request->name : null;
        $location = $request->location_id ? $request->location_id : null;
        $minprice = $request->min ? $request->min : null;
        $maxprice = $request->max ? $request->max : null;

        $data['locations']  = Location::whereStatus(1)->orderBy('id','desc')->get();

        $data['properties'] = Property::when($name, function ($q) use ($name) {
                                            return $q->where('name', 'LIKE', "%$name%");
                                        })
                                        ->when($location, function ($q) use ($location) {
                                            return $q->whereLocationId($location);
                                        })
                                        ->when($minprice, function($query, $minprice) {
                                            return $query->where('price', '>=', $minprice);
                                        })
                                        ->when($maxprice, function($query, $maxprice) {
                                            return $query->where('price', '<=', $maxprice);
                                        })
                                        ->whereIsInvest(1)
                                        ->whereStatus(1)
                                        ->orderBy('id', 'desc')
                                        ->paginate(6);

        return view('frontend.invest_properties',$data);
    }
}
