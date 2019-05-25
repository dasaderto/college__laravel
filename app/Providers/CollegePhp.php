<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegePhp extends Model
{
    protected $connection = 'collegephp';
    
    protected $table = 'program';
    
    public function pr_priem()
    {
        //return hasOne ();
    }
}

