<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $property = Property::findOrFail($id);
        if(count($property->galleries))
        {
            $data[0] = 1;
            $data[1] = $property->galleries;
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = null;
        $lastid = $request->property_id;
        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                $val = $file->getClientOriginalExtension();
                if($val == 'jpeg'|| $val == 'jpg'|| $val == 'png'|| $val == 'svg')
                  {
                    $gallery = new Gallery();
                    $name = time().$file->getClientOriginalName();
                    $file->move('assets/images',$name);
                    $gallery['photo'] = $name;
                    $gallery['property_id'] = $lastid;
                    $gallery->save();
                    $data[] = $gallery;
                  }
            }
        }
        return response()->json($data);
    }

    public function destroy()
    {
        $id = $_GET['id'];
        $gal = Gallery::findOrFail($id);
        @unlink('assets/images/'.$gal->photo);
        $gal->delete();

    }
}
