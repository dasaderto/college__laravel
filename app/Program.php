<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'degree_id',
        'direction_id',
        'faculty_id',
        'form_ids',
        
        'status',
        'comment',
        
        'duration_study',
        'possible_duration_study',
        'budget_places',
        'budget_places_special',
        'places_target_quota',
        'paid_places',

        'competition',
        'average_point',
        'min_point',
        'price',

        'courses',

        'training_english',
        'double_defree_program',
        'accreditation',

        'educational_process'
    ];
/* 
    protected $casts = [
        'form_ids' => 'array',
        'educational_process' => 'array'
    ];
*/
    public function setFormIdsAttribute($value)
    {
        $this->attributes['form_ids'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getFormIdsAttribute($value)
    {
        return json_decode($value);
    }
    
    public function setEducationalProcessAttribute($value)
    {
        $this->attributes['educational_process'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getEducationalProcessAttribute($value)
    {
        return json_decode($value);
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
    /*
    public function form()
    {
        return $this->BelongsTo('App\Form');
    }*/
}

