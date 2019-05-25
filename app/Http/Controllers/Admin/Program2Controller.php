<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Program;
use App\Program2;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\Course;

class Program2Controller extends Controller
{
    public function index()
    {
        $programs = Program2::take(2)->get();
        $forms = array_column(Form::all()->toArray(), null, 'id');
        
        $degrees_json = Degree::all()->keyBy('id')->map(function($item){
            return $item->name;
        });
        $directions_json = Direction::all()->keyBy('id')->map(function($item){
            return $item->name;
        });
        $faculties_json = Faculty::all()->keyBy('id')->map(function($item){
            return $item->name;
        });
        $forms_json = Form::all()->keyBy('id')->map(function($item){
            return $item->name;
        });

        return view('admin.programs2.index', [
            'programs'      => $programs,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => $forms,
            'courses'       => Course::all(),
            'degrees_json'      => $degrees_json,
            'directions_json'   => $directions_json,
            'faculties_json'    => $faculties_json,
            'forms_json'        => $forms_json
        ]);
    }
    
    public function show($id)
    {
        $program = Program2::find($id);
        return view('admin.programs2.show', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
            'courses' => Course::all()
        ]);
    }
    
    public function show_html($id)
    {
        $program = Program2::find($id);
        return view('admin.programs2.show_html.index', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
            'courses' => Course::all()
        ]);
    }
    
    public function download_html($id)
    {
        $program = Program2::find($id);
        Storage::put('programs2_html/progam2_'.$program->id.'.html', view('admin.programs.show_html.index', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
            'courses' => Course::all()
        ]));
    }
    
    public function create()
    {
        return view('admin.programs2.create', [
            'program' => '',
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
            'courses' => Course::all()
        ]);
    }
    
    public function store(Request $request)
    {
        $program = new Program2();
        
        $program->name = $request->name;
        $program->degree_id = $request->degree;
        $program->direction_id = $request->direction;
        $program->faculty_id = $request->faculty;
        $program->form_ids = $request->forms;
        $program->status = $request->status;
        $program->comment = $request->comment ?? '';
        $program->duration_study = $request->duration_study;
        $program->possible_duration_study = $request->possible_duration_study;
        $program->budget_places = $request->budget_places;
        $program->budget_places_special = $request->budget_places_special;
        $program->places_target_quota = $request->places_target_quota;
        $program->paid_places = $request->paid_places;
        $program->competition = $request->competition;
        $program->average_point = $request->average_point;
        $program->min_point = $request->min_point;
        $program->price = $request->price;
        $program->courses = $request->courses;
        $program->training_english = $request->training_english;
        $program->double_defree_program = $request->double_defree_program;
        $program->accreditation = $request->accreditation;
        $program->educational_process = $request->educational_process;
        
        $program->save();
        
        return redirect()->route('admin.program2.index');
    }
    
    public function edit($id)
    {
        $program = Program2::find($id);
        
        $courses = Course::all();
        
        $courses_json = $courses->map(function($c){
            return $c->only(['id', 'name']);
        });
        
        return view('admin.programs2.edit', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
            'courses' => $courses,
            'courses_json' => $courses_json->toArray()
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $program = Program2::find($id);
        
        $program->name = $request->name;
        $program->degree_id = $request->degree;
        $program->direction_id = $request->direction;
        $program->faculty_id = $request->faculty;
        $program->form_ids = $request->forms;
        $program->status = $request->status;
        $program->comment = $request->comment ?? '';
        $program->duration_study = $request->duration_study;
        $program->possible_duration_study = $request->possible_duration_study;
        $program->budget_places = $request->budget_places;
        $program->budget_places_special = $request->budget_places_special;
        $program->places_target_quota = $request->places_target_quota;
        $program->paid_places = $request->paid_places;
        $program->competition = $request->competition;
        $program->average_point = $request->average_point;
        $program->min_point = $request->min_point;
        $program->price = $request->price;
        $program->courses = $request->courses;
        $program->training_english = $request->training_english;
        $program->double_defree_program = $request->double_defree_program;
        $program->accreditation = $request->accreditation;
        $program->educational_process = $request->educational_process;

        $program->save();
        
        return redirect()->route('admin.program2.index');
    }
    
    public function mass_update(Request $request)
    {
        $data = $request->data;
        
        foreach ($request->data as $item) {
            $program = Program2::find($item['id']);
            
            if(isset($item['degree']))
                $program->degree_id = $item['degree'];
            
            if(isset($item['direction']))
                $program->direction_id = $item['direction'];
            
            if(isset($item['faculty']))
                $program->faculty_id = $item['faculty'];
            
            $program->save();
        }
        
        return redirect()->route('admin.program2.index');
    }
    
    public function destroy($id)
    {
        
    }
    
    public function get_programs(Request $request)
    {
        return response()->json('response true');
    }
}

