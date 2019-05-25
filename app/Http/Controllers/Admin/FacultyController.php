<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Faculty::all();
        
        return view('admin.taxonomies.index', [
            'title' => 'Факультеты',
            'route' => 'faculty',
            'taxonomies' => $faculty,
        ]);
    }
    
    public function create()
    {
        return view('admin.taxonomies.create', [
            'title' => 'Добавить факультет',
            'route' => 'faculty',
            'taxonomy' => '',
        ]);
    }
    
    public function store(Request $request)
    {
        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        $faculty->save();
        
        return redirect()->route('admin.faculty.index');
    }
    
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('admin.taxonomies.edit', [
            'title' => 'Редактировать факультет: ',
            'route' => 'faculty',
            'taxonomy' => $faculty,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $faculty = Faculty::find($id);
        $faculty->name = $request->name;
        $faculty->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        $faculty->save();
        
        return redirect()->route('admin.faculty.index');
    }
    
    public function destroy($id)
    {
        
    }
}

