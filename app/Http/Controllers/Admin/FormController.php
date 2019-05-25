<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Form;

class FormController extends Controller
{
    public function index()
    {
        $form = Form::all();
        
        return view('admin.taxonomies.index', [
            'title' => 'Формы образования',
            'route' => 'form',
            'taxonomies' => $form,
        ]);
    }
    
    public function create()
    {
        return view('admin.taxonomies.create', [
            'title' => 'Добавить форму образования',
            'route' => 'form',
            'taxonomy' => '',
        ]);
    }
    
    public function store(Request $request)
    {
        $form = new Form();
        $form->name = $request->name;
        $form->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        $form->save();
        
        return redirect()->route('admin.form.index');
    }
    
    public function edit($id)
    {
        $form = Form::find($id);
        return view('admin.taxonomies.edit', [
            'title' => 'Редактировать форму образования: ',
            'route' => 'form',
            'taxonomy' => $form,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $form = Form::find($id);
        $form->name = $request->name;
        $form->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        $form->save();
        
        return redirect()->route('admin.form.index');
    }
    
    public function destroy($id)
    {
        
    }
}

