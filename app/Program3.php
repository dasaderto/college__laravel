<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program3 extends Model
{
    protected $table = 'programs3';
    
    protected $fillable = [
        'name',
        'status',
        
        'degree_id',
        'direction_id',
        'faculty_id',
        'forms',
        'courses',
        
        'data',
        'comment',
    ];

    protected $casts = [
        'degree_id'     => 'integer',
        'direction_id'  => 'integer',
        'faculty_id'    => 'integer',
        'courses'       => 'array',
        'forms'         => 'array',
    ];
    

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getDataAttribute($value)
    {
        return json_decode($value, true);
    }
    
    public function degree()
    {
        return $this->BelongsTo('App\Degree');
    }
    
    public function direction()
    {
        return $this->BelongsTo('App\Direction');
    }
    
    public function faculty()
    {
        return $this->BelongsTo('App\Faculty');
    }
}

