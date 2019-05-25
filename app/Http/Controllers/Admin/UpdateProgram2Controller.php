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

class UpdateProgram2Controller extends Controller
{
    public function update()
    {
        //$this->couses();
        $this->to_integer();
    }
        
    public function to_integer()
    {
        $programs = Program2::all();

        foreach($programs as $p) {
            if($p->status == 'Рабочая') $p->status = 1;
            if($p->status == 'Снята') $p->status = 0;
            
            
            $duration_study = ($p->duration_study !== '-') ? str_replace('года', '', $p->duration_study) : '';
            $p->duration_study = str_replace(',', '.', $duration_study);
            
            $possible_duration_study = ($p->possible_duration_study === '-') ? '' : str_replace('года', '', $p->possible_duration_study);
            $p->possible_duration_study = str_replace(',', '.', $possible_duration_study);
            
            
            $p->budget_places = ($p->budget_places === '-' || $p->budget_places === '?') ? '' :$p->budget_places;
            $p->budget_places_special = ($p->budget_places_special === '-' || $p->budget_places_special === '?') ? '' : $p->budget_places_special;
            $p->places_target_quota = ($p->places_target_quota === '-' || $p->places_target_quota === '?') ? '' :$p->places_target_quota;
            $p->paid_places = ($p->paid_places === '-' || $p->paid_places === '?') ? '' :$p->paid_places;
            
            $p->competition = ($p->competition === '-' || $p->competition === '?') ? '' : str_replace(',', '.', $p->competition);
            
            $p->average_point = ($p->average_point === '-' || $p->average_point === '?') ? '' : str_replace(',', '.', $p->average_point);
            $min_point = ($p->min_point === '-' || $p->min_point === '?') ? '' : str_replace('баллов', '', $p->min_point);
            $p->min_point = trim($min_point);
                    
            $price = ($p->price === '-') ? '' : str_replace('тыс', '', $p->price);
            $p->price = str_replace(',', '.', $price);
            
            
            if($p->training_english === 'Есть') $p->training_english = 1;
            if($p->training_english === 'Нет' || $p->training_english === '-' || $p->training_english === '?') $p->training_english = 0;
            
            if($p->double_defree_program === 'Есть') $p->double_defree_program = 1;
            if($p->double_defree_program === 'Нет' || $p->double_defree_program === '-' || $p->double_defree_program === '?') $p->double_defree_program = 0;
            
            if($p->accreditation === 'Есть') $p->accreditation = 1;
            if($p->accreditation === 'Нет' || $p->accreditation === '-' || $p->accreditation === '?') $p->accreditation = 0;
            

            echo $p->accreditation.'<br>';
            //$p->save();
        }
    }
    
    public function courses()
    {
        $programs = Program2::all();//take(20)->get();
        $courses = array_column(Course::all()->toArray(), 'id', 'name');
        $forms = array_column(Form::all()->toArray(), null, 'id');
        $unice_courses = [];

        foreach($programs as $p) {
            if($p->courses !== '-')
                $c = preg_split('~[0-9]\)~', $p->courses, null, PREG_SPLIT_NO_EMPTY);
            else 
                $c = [];
            
            $c = array_map('trim', $c);
            
            /*if(isset($c[0]) && !in_array($c[0], $unice_courses))
                    $unice_courses[] = $c[0];
            if(isset($c[1]) && !in_array($c[1], $unice_courses))
                    $unice_courses[] = $c[1];
            if(isset($c[2]) && !in_array($c[2], $unice_courses))
                    $unice_courses[] = $c[2];*/
            
            if(isset($c[0]))
                    $c[0] = $courses[$c[0]];
            if(isset($c[1]))
                    $c[1] = $courses[$c[1]];
            if(isset($c[2]))
                    $c[2] = $courses[$c[2]];
            
            $p->courses = json_encode($c);
            //dump($p);
            //$p->save();
            //echo $p->courses.'<br>';
        }
        //dump($unice_courses);
        
        /*foreach($unice_courses as $c) {
            $model = new Course;
            
            $model->name = $c;
            $model->slug = Str::slug(mb_substr($c, 0, 255));
            
            $model->save();
        }*/
    }
}

