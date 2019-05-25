<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyColumn extends Model
{
    protected  $table = 'properties_columns';
    
    protected $fillable = [
        'name',
        'value',
    ];
}

