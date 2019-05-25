<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Direction;

class DirectionController extends Controller
{
    public function index()
    {
        $direction = Direction::all();
        
        return view('admin.taxonomies.index', [
            'title' => 'Направления образования',
            'route' => 'direction',
            'taxonomies' => $direction,
        ]);
    }
    
    public function create()
    {
        return view('admin.taxonomies.create', [
            'title' => 'Добавить направление образования',
            'route' => 'direction',
            'taxonomy' => '',
        ]);
    }
    
    public function store(Request $request)
    {
        $direction = new Direction();
        $direction->name = $request->name;
        $direction->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        $direction->save();
        
        return redirect()->route('admin.direction.index');
    }
    
    public function edit($id)
    {
        $direction = Direction::find($id);
        return view('admin.taxonomies.edit', [
            'title' => 'Редактировать направление образования: ',
            'route' => 'direction',
            'taxonomy' => $direction,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $direction = Direction::find($id);
        $direction->name = $request->name;
        $direction->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        $direction->save();
        
        return redirect()->route('admin.direction.index');
    }
    
    public function destroy($id)
    {
        
    }
}

