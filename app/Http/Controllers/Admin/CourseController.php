<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        
        return view('admin.taxonomies.index', [
            'title' => 'Предметы обучения',
            'route' => 'course',
            'taxonomies' => $course,
        ]);
    }
    
    public function create()
    {
        return view('admin.taxonomies.create', [
            'title' => 'Добавить предмет обучения',
            'route' => 'course',
            'taxonomy' => '',
        ]);
    }
    
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        $course->save();
        
        return redirect()->route('admin.course.index');
    }
    
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.taxonomies.edit', [
            'title' => 'Редактировать предмет обучения: ',
            'route' => 'course',
            'taxonomy' => $course,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->name = $request->name;
        $course->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        $course->save();
        
        return redirect()->route('admin.course.index');
    }
    
    public function destroy($id)
    {
        
    }
}

