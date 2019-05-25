<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTransferRecovery extends Model
{
    protected $table = 'documents_transfer_recovery';
    
    protected $fillable = [
        'type_terms',
        'degree_id',
        'form_id',
        
        'type_price',
        'category_applicants',
        'categories_applicants_combined',
        'responsible_filling',
        
        'documents',
    ];

    protected $casts = [
        'type_terms' => 'integer',
        'type_price' => 'integer',
        'category_applicants' => 'integer',
        'categories_applicants_combined' => 'array',
        'responsible_filling' => 'integer',
        'documents' => 'array',
    ];
/*
    public function setCategoriesApplicantsCombinedAttribute($value)
    {
        $this->attributes['categories_applicants_combined'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getCategoriesApplicantsCombinedAttribute($value)
    {
        return json_decode($value);
    }
    
    public function setDocumentsAttribute($value)
    {
        $this->attributes['documents'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getDocumentsAttribute($value)
    {
        return json_decode($value);
    }
*/    
    public function degree()
    {
        return $this->BelongsTo('App\Degree');
    }
    
    public function form()
    {
        return $this->BelongsTo('App\Form');
    }
}

