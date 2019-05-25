<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Program;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();//take(20)->get();
        $forms = array_column(Form::all()->toArray(), null, 'id');
        

        return view('admin.programs.index', [
            'programs' => $programs,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => $forms,
        ]);
    }
    
    public function show($id)
    {
        $program = Program::find($id);
        return view('admin.programs.show', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
        ]);
    }
    
    public function show_html($id)
    {
        $program = Program::find($id);
        return view('admin.programs.show_html.index', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
        ]);
    }
    
    public function download_html($id)
    {
        $program = Program::find($id);
        Storage::put('programs_html/progam_'.$program->id.'.html', view('admin.programs.show_html.index', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
        ]));
    }
    
    public function create()
    {
        return view('admin.programs.create', [
            'program' => '',
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
        ]);
    }
    
    public function store(Request $request)
    {
        $program = new Program();
        
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
        
        return redirect()->route('admin.program.index');
    }
    
    public function edit($id)
    {
        $program = Program::find($id);
        return view('admin.programs.edit', [
            'program' => $program,
            'degrees' => Degree::all(),
            'directions' => Direction::all(),
            'faculties' => Faculty::all(),
            'forms' => Form::all(),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        
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
        
        return redirect()->route('admin.program.index');
    }
    
    public function destroy($id)
    {
        
    }
    
    public function get_programs(Request $request)
    {
        return response()->json('response true');
    }
}

