<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use Validator;
use Purifier;

class PageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function update(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();

        if ($file = $request->file('hero_photo'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            @unlink('assets/images/'.$data->hero_photo);
            $input['hero_photo'] = $name;
        }

        if ($file = $request->file('login_banner'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            @unlink('assets/images/'.$data->login_banner);
            $input['login_banner'] = $name;
        }

        if ($file = $request->file('download_photo'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            @unlink('assets/images/'.$data->download_photo);
            $input['download_photo'] = $name;
        }

        if ($file = $request->file('review_photo'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            @unlink('assets/images/'.$data->review_photo);
            $input['review_photo'] = $name;
        }

        if($request->location_subtitle){
            $input['location_subtitle'] = Purifier::clean($request->location_subtitle);
        }

        if($request->plan_subtitle){
            $input['plan_subtitle'] = Purifier::clean($request->plan_subtitle);
        }

        if($request->blog_subtitle){
            $input['blog_subtitle'] = Purifier::clean($request->blog_subtitle);
        }
        if($request->feature_text){
            $input['feature_text'] = Purifier::clean($request->feature_text);
        }
        if($request->login_subtitle){
            $input['login_subtitle'] = Purifier::clean($request->login_subtitle);
        }

        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function homeupdate(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();

        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }


    public function customization(){
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.customization',compact('data'));
    }

    public function customizationUpdate(Request $request){
        $data = Pagesetting::find(1);

        if($request->home_module){
            $input['home_module'] = json_encode($request->home_module,true);
        }else{
            $input['home_module'] = NULL;
        }
        $data->update($input);

        if($request->ajax()){
            $msg = 'Data Updated Successfully.';
            return response()->json($msg);
        }else{
            return back()->withSuccess('Data Updated Successfully.');
        }
    }

    public function hero(){
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.hero_section',compact('data'));
    }

    public function download(){
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.download',compact('data'));
    }

    public function about(){
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.about',compact('data'));
    }

    public function calltoaction(){
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.call_section',compact('data'));
    }

    public function contact()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.contact',compact('data'));
    }

    public function sectionHeading(){
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.sectionheading',compact('data'));
    }

    public function customize()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.customize',compact('data'));
    }


    public function blogsection()
    {
        $ps = HomepageSetting::findOrFail(1);
        return view('admin.pagesetting.blog_section',compact('ps'));
    }


    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', 'FAQ Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', 'Contact Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }


}
