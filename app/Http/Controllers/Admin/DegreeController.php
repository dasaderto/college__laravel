<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Degree;

class DegreeController extends Controller
{
    public function index()
    {
        $degree = Degree::all();
        
        return view('admin.taxonomies.index', [
            'title' => 'Уровни образования',
            'route' => 'degree',
            'taxonomies' => $degree,
        ]);
    }
    
    public function create()
    {
        return view('admin.taxonomies.create', [
            'title' => 'Добавить уровень образования',
            'route' => 'degree',
            'taxonomy' => '',
        ]);
    }
    
    public function store(Request $request)
    {
        $degree = new Degree();
        $degree->name = $request->name;
        $degree->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        $degree->save();
        
        return redirect()->route('admin.degree.index');
    }
    
    public function edit($id)
    {
        $degree = Degree::find($id);
        return view('admin.taxonomies.edit', [
            'title' => 'Редактировать уровень образования: ',
            'route' => 'degree',
            'taxonomy' => $degree,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $degree = Degree::find($id);
        $degree->name = $request->name;
        $degree->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        $degree->save();
        
        return redirect()->route('admin.degree.index');
    }
    
    public function destroy($id)
    {
        
    }
}

