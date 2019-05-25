<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Program4;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\Course;


use App\CollegePhp;

class Program4Controller extends Controller
{
    public function index()
    {
        $college_php = CollegePhp::take(5)->get();
        
        dump($college_php);
    }
}

