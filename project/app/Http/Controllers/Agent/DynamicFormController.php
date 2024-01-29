<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\DynamicForm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DynamicFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $data['fields'] = DynamicForm::whereUserId(auth()->id())
                                      ->whereFormType('buy_sell')
                                      ->get();
        return view('agent.forms.create',$data);
    }

    public function store(Request $request)
    {
       $request->validate([
           'type'=> 'required|in:1,2,3',
           'label' => [
                'required',
                Rule::unique('dynamic_forms')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                })
            ],
           'required' => 'required'
       ]);


       $form = new DynamicForm();
       $form->user_type = 2;
       $form->user_id   = auth()->id();
       $form->type      = $request->type;
       $form->form_type = 'buy_sell';
       $form->label     = $request->label;
       $form->name      = Str::slug($request->label,'_');
       $form->required  = $request->required;
       $form->save();

       return back()->with('message','Form field added successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'type'=> 'required|in:1,2,3',
            'label' => 'required',
            'required' => 'required'
        ]);

        $form            = DynamicForm::findOrFail($request->id);
        $form->user_type = $request->user_type;
        $form->user_id   = auth()->id();
        $form->form_type = 'buy_sell';
        $form->type      = $request->type;
        $form->label     = $request->label;
        $form->name      = Str::slug($request->label,'_');
        $form->required  = $request->required;
        $form->save();

        return back()->with('message','Form field updated successfully');

    }

    public function deletedField(Request $request)
    {
        DynamicForm::findOrFail($request->id)->delete();
        return back()->with('message','Form field has removed');
    }
}
