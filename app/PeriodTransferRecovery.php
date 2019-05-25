<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodTransferRecovery extends Model
{
    protected $table = 'periods_transfer_recovery';
    
    protected $fillable = [
        'type_terms',
        'degree_id',
        'form_id',
        
        'type_price',
        'category_applicants',
        'category_applicants_combined',
        'responsible_filling',
        
        'start_submission_documents',
        'end_submission_documents',
        'methods_submission_documents',
        
        'results_commission'
    ];
    
    protected $casts = [
        'type_terms' => 'integer',
        'degree_id' => 'integer',
        'form_id' => 'integer',
        
        'type_price' => 'integer',
        'category_applicants' => 'integer',
        'category_applicants_combined' => 'integer',
        'responsible_filling' => 'integer',
        
        'start_submission_documents' => 'integer',
        'end_submission_documents' => 'integer',
        'methods_submission_documents' => 'array',
        
        'results_commission' => 'integer',
    ];
    
    /*public function setMethodsSubmissionDocumentsAttribute($value)
    {
        $this->attributes['methods_submission_documents'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getMethodsSubmissionDocumentsAttribute($value)
    {
        return json_decode($value);
    }*/
    
    public function degree()
    {
        return $this->BelongsTo('App\Degree');
    }
    
    public function form()
    {
        return $this->BelongsTo('App\Form');
    }
}

