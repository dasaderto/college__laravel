<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
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
        'days_end_submission_document_education',
        
        'start_conclusion_contracts',
        'end_conclusion_contracts',
        'end_payment_contracts',
        
        'formation_lists_applicants',
        
        'days_enrollment_orders',
        
        'start_entrance_examination',
        'end_entrance_examination',
        'reserve_days_entrance_examinations',

        'results_commission'
    ];
    
    protected $casts = [
        'type_terms' => 'integer',
        'degree_id' => 'integer',
        'degree_id' => 'integer',
        
        'type_price' => 'integer',
        'category_applicants' => 'integer',
        'category_applicants_combined' => 'integer',
        'responsible_filling' => 'integer',
        
        'start_submission_documents' => 'integer',
        'end_submission_documents' => 'integer',
        'days_end_submission_document_education' => 'array',
        
        'start_conclusion_contracts' => 'integer',
        'end_conclusion_contracts' => 'integer',
        'end_payment_contracts' => 'integer',
        
        'formation_lists_applicants' => 'integer',
        
        'days_enrollment_orders' => 'array',
        
        'start_entrance_examination' => 'integer',
        'end_entrance_examination' => 'integer',
        'reserve_days_entrance_examinations' => 'integer',
        
        'results_commission' => 'integer',
    ];
    
    /*public function setDaysEnrollmentOrdersAttribute($value)
    {
        $this->attributes['days_enrollment_orders'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getDaysEnrollmentOrdersAttribute($value)
    {
        return json_decode($value);
    }
    
    public function setDaysEndSubmissionDocumentEducationAttribute($value)
    {
        $this->attributes['days_end_submission_document_education'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
    public function getDaysEndSubmissionDocumentEducationAttribute($value)
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

