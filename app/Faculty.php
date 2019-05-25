<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {
    
    protected $fillable = [
        'name',
        'slug',
        'address',
        'metro',
        'phones',
        'educational_process'
    ];
    
    protected $casts = [
        'phones' => 'array',
        'educational_process'
    ];
    
    public function setPhonesAttribute($value)
    {
        $this->attributes['phones'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getPhonesAttribute($value)
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
}