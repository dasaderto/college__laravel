<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Program;
use App\Program2;
use App\Program3;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\Course;
use App\DocumentTransferRecovery;
use App\Period;
use App\PeriodTransferRecovery;
use App\PropertyColumn;

class RestructuringController extends Controller
{
    public $documents_transfer_recovery = [
        'type_terms',
        
        'type_price',
        'category_applicants',
        'categories_applicants_combined',
        'responsible_filling',
        
        'documents',
    ];
    public $periods = [
        'type_terms',
        
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
    public $periods_transfer_recovery = [
        'type_terms',
        
        'type_price',
        'category_applicants',
        'category_applicants_combined',
        'responsible_filling',
        
        'start_submission_documents',
        'end_submission_documents',
        'methods_submission_documents',
        
        'results_commission'
    ];
    public $unique = [];
    public $properties = '';

    public function index()
    {
        
    }
    public function set_value_array($item_row, $row)
    {
        if($item_row === null)
            $item_row = 'nullable';
        $prop = $this->properties->where('name', $row)->where('value', $item_row)->first()->id;
        return $prop;
    }
    
    public function set_value($item, $row)
    {
        if($item->$row === null)
            $item->$row = 'nullable';
        $prop = $this->properties->where('name', $row)->where('value', $item->$row)->first()->id;
        $item->$row = $prop;
    }
    
    public function Restructuring() {
        $t1 = DocumentTransferRecovery::all();
        //$t1 = DocumentTransferRecovery::take(5)->get();
        $t2 = Period::all();
        $t3 = PeriodTransferRecovery::all();
        $t3 = PeriodTransferRecovery::take(5)->get();
        
        $this->properties = PropertyColumn::where('table', 'periods_transfer_recovery')->get(['id', 'name', 'value']);
        
        
        foreach ($t3 as $item) {
            foreach ($this->documents_transfer_recovery as $key => $row) {
                if(is_array($item->$row)) {
                    $prop = [];
                    foreach ($item->$row as $item_row) {
                        if($item_row === '-')
                            continue;
                        $prop[] = $this->set_value_array($item_row, $row);
                    }
                    $item->$row = $prop;
                    continue;
                }
                $this->set_value($item, $row);
            }
            //$item->save();
        }
        foreach ($t3 as $item) {
            dump($item);
        }
    }
    
    public function CreateProperties() {
        $t1 = DocumentTransferRecovery::all();
        $t2 = Period::all();
        $t3 = PeriodTransferRecovery::all();
        
        $this->unique = $this->periods;
        
        foreach ($t2 as $item) {
            foreach ($this->periods as $key => $value) {
                if(isset($this->unique[$key]) && !is_array($this->unique[$key])) {
                    unset($this->unique[$key]);
                    $this->unique[$value] = [];
                }
                if(is_array($item->$value)) {
                    foreach ($item->$value as $item_value) {
                        if(!in_array($item_value, $this->unique[$value])) {
                            $this->unique[$value][] = $item_value;
                        }
                    }
                    continue;
                }
                if(!in_array($item->$value, $this->unique[$value])) {
                    $this->unique[$value][] = $item->$value;
                }
                
            }
        }

        foreach ($this->unique as $k => $v) {
            foreach ($v as $k1 => $v2) {
                if($v2 === null)
                    $v2 = 'nullable';
                $p = new PropertyColumn();
            
                $p->table = 'periods';
                $p->name = $k;
                $p->value = $v2;
                
                $p->save();
            }
        }
        
        dump($this->unique);
    }
}

