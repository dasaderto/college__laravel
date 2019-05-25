<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Program3;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\Course;

class Program3Controller extends Controller
{
    public function index()
    {
        $programs = Program3::all();
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
        
        $accreditations = [
            ['id' => 1, 'name' => 'Ассоциация участников финансового рынка "Совет по развитию профессиональных квалификаций"'],
            ['id' => 2, 'name' => 'Ассоциация участников финансового рынка "Совет по профессиональным квалификациям финансового рынка"'],
            ['id' => 3, 'name' => 'НП "Институт профессиональных  бухгалтеров и аудиторов России" (НП "ИПБ России")']
        ];
        $international_accreditations = [
            ['id' => 1, 'name' => 'АССА Accredited Programme'],
            ['id' => 2, 'name' => 'ECBE Accreditation'],
        ];

        return view('admin.programs3.index', [
            'programs'      => $programs,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => $forms,
            'courses'       => Course::all(),
            'degrees_json'      => $degrees_json,
            'directions_json'   => $directions_json,
            'faculties_json'    => $faculties_json,
            'forms_json'        => $forms_json,
            'accreditations'    => $accreditations,
            'international_accreditations' => $international_accreditations,
        ]);
    }
    
    public function show($id)
    {
        $program = Program3::find($id);
        
        $accreditations = [
            1 => 'Ассоциация участников финансового рынка "Совет по развитию профессиональных квалификаций"',
            2 => 'Ассоциация участников финансового рынка "Совет по профессиональным квалификациям финансового рынка"',
            3 => 'НП "Институт профессиональных  бухгалтеров и аудиторов России" (НП "ИПБ России")'
        ];
        $international_accreditations = [
            1 => 'АССА Accredited Programme',
            2 => 'ECBE Accreditation'
        ];
        
        return view('admin.programs3.show', [
            'program'       => $program,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
            'courses'       => Course::all(),
            'accreditations'                => $accreditations,
            'international_accreditations'  => $international_accreditations,
        ]);
    }
    
    public function show_html($id)
    {
        $program = Program3::find($id);
        
        $accreditations = [
            1 => 'Ассоциация участников финансового рынка "Совет по развитию профессиональных квалификаций"',
            2 => 'Ассоциация участников финансового рынка "Совет по профессиональным квалификациям финансового рынка"',
            3 => 'НП "Институт профессиональных  бухгалтеров и аудиторов России" (НП "ИПБ России")'
        ];
        $international_accreditations = [
            1 => 'АССА Accredited Programme',
            2 => 'ECBE Accreditation'
        ];
        
        return view('admin.programs3.show_html.layouts.layout2', [
            'program'       => $program,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
            'courses'       => Course::all(),
            'accreditations'                => $accreditations,
            'international_accreditations'  => $international_accreditations,
            'program_degree_slug'           => 'bakalavriat',
            'program_degree_name'           => 'Бакалавриат',
        ]);
    }
    
    public function download_html($id)
    {
        $program = Program3::find($id);
        Storage::put('programs2_html/progam3_'.$program->id.'.html', view('admin.programs.show_html.index', [
            'program'       => $program,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
            'courses'       => Course::all()
        ]));
    }
    
    public function create(Request $request)
    {
        $accreditations = [
            ['id' => 1, 'name' => 'Ассоциация участников финансового рынка "Совет по развитию профессиональных квалификаций"'],
            ['id' => 2, 'name' => 'Ассоциация участников финансового рынка "Совет по профессиональным квалификациям финансового рынка"'],
            ['id' => 3, 'name' => 'НП "Институт профессиональных  бухгалтеров и аудиторов России" (НП "ИПБ России")']
        ];
        $international_accreditations = [
            ['id' => 1, 'name' => 'АССА Accredited Programme'],
            ['id' => 2, 'name' => 'ECBE Accreditation'],
        ];
        
        return view('admin.programs3.create', [
            'program'       => new Program3(),
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
            'courses'       => Course::all(),
            'accreditations'                => $accreditations,
            'international_accreditations'  => $international_accreditations,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'degree_id'     => 'required',
            'direction_id'  => 'required',
            'faculty_id'    => 'required',
            'forms'         => 'required',
        ]);
        
        $program = new Program3();
        
        $program->name = $request->name;
        $program->status = 2;
        
        $program->degree_id = $request->degree_id;
        $program->direction_id = $request->direction_id;
        $program->faculty_id = $request->faculty_id;
        $program->courses = [];
        $program->forms = $request->forms;
        
        $program->data = '';
        $program->comment = '';
        
        $program->save();
        
        return redirect()->route('admin.program3.edit', $program->id);
    }
    
    public function edit($id)
    {
        $program = Program3::find($id);
        
        $courses = Course::all();
        
        $courses_json = $courses->map(function($c){
            return $c->only(['id', 'name']);
        });
        
        $accreditations = [
            ['id' => 1, 'name' => 'Ассоциация участников финансового рынка "Совет по развитию профессиональных квалификаций"'],
            ['id' => 2, 'name' => 'Ассоциация участников финансового рынка "Совет по профессиональным квалификациям финансового рынка"'],
            ['id' => 3, 'name' => 'НП "Институт профессиональных  бухгалтеров и аудиторов России" (НП "ИПБ России")']
        ];
        $international_accreditations = [
            ['id' => 1, 'name' => 'АССА Accredited Programme'],
            ['id' => 2, 'name' => 'ECBE Accreditation'],
        ];
        
        return view('admin.programs3.edit', [
            'program'       => $program,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
            'courses'       => $courses,
            'courses_json'  => $courses_json->toArray(),
            'accreditations'                => $accreditations,
            'international_accreditations'  => $international_accreditations,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $program = Program3::find($id);
        
        $data = $request->data;
        if(!isset($request->data['portfolio']))
            $data['portfolio'] = 0;
        $request->data = $data;
        
        $program->name = $request->name;
        $program->status = $request->status;
        
        $program->degree_id = $request->degree_id;
        $program->direction_id = $request->direction_id;
        $program->faculty_id = $request->faculty_id;
        $program->courses = json_decode($request->courses);
        $program->forms = $request->forms;
        
        $program->data = $request->data;
        $program->comment = $request->comment ?? '';
        
        $program->save();
        
        return redirect()->route('admin.program3.index');
    }
    
    public function mass_update(Request $request)
    {
        return dump('Массовое редактирование времмено отключено');
        $data = $request->data;
        
        foreach ($request->data as $item) {
            $program = Program2::find($item['id']);
            
            if(isset($item['degree_id']))
                $program->degree_id = $item['degree_id'];
            
            if(isset($item['direction_id']))
                $program->direction_id = $item['direction_id'];
            
            if(isset($item['faculty_id']))
                $program->faculty_id = $item['faculty_id'];
            
            $program->save();
        }
        
        return redirect()->route('admin.program3.index');
    }
    
    public function destroy($id)
    {
        
    }
    
    public function get_programs(Request $request)
    {
        return response()->json('response true');
    }
}

