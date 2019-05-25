<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Period;
use App\Program;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\PropertyColumn;

class PeriodController extends Controller
{
    public function index()
    {
        $data = Period::all();
        $props  = PropertyColumn::where('table', 'periods')->get(['id', 'name', 'value']);
        $forms = array_column(Form::all()->toArray(), null, 'id');
        
        return view('admin.periods.index', [
            'data'          => $data,
            'props'         => $props,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => $forms,
        ]);
    }
    
    public function show($id)
    {
        $data = Period::find($id);
        $props  = PropertyColumn::where('table', 'periods')->get(['id', 'name', 'value']);
        
        return view('admin.periods.show', [
            'data'          => $data,
            'props'         => $props,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
        ]);
    }
    
    public function create()
    {
        $props  = PropertyColumn::where('table', 'periods')->get(['id', 'name', 'value']);
        
        return view('admin.periods.create', [
            'data'          => '',
            'props'         => $props,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
        ]);
    }
    
    public function store(Request $request)
    {
        $days_enrollment_orders = [];
        $days_end_submission_document_education = [];
                
        foreach($request->days_end_submission_document_education as $k => $v) {
            if($v !== null)
                $days_end_submission_document_education[] = (int)$v;
        }
        
        foreach($request->days_enrollment_orders as $k => $v) {
            if($v !== null)
                $days_enrollment_orders[] = (int)$v;
        }
        
        $request->validate([
            'type_terms'    => 'required',
            'degree_id'     => 'required',
            'form_id'       => 'required',
            'type_price'    => 'required',
        ]);
        
        $data = new Period();
        
        $data->type_terms = $request->type_terms;
        $data->degree_id = $request->degree_id;
        $data->form_id = $request->form_id;
        $data->type_price = $request->type_price;
        $data->category_applicants = $request->category_applicants;
        $data->category_applicants_combined = $request->category_applicants_combined;
        $data->responsible_filling = $request->responsible_filling;
        $data->start_submission_documents = $request->start_submission_documents;
        $data->end_submission_documents = $request->end_submission_documents;
        $data->days_end_submission_document_education = $days_end_submission_document_education;
        $data->start_conclusion_contracts = $request->start_conclusion_contracts;
        $data->end_conclusion_contracts = $request->end_conclusion_contracts;
        $data->end_payment_contracts = $request->end_payment_contracts;
        $data->formation_lists_applicants = $request->formation_lists_applicants;
        $data->days_enrollment_orders = $days_enrollment_orders;
        $data->start_entrance_examination = $request->start_entrance_examination;
        $data->end_entrance_examination = $request->end_entrance_examination;
        $data->reserve_days_entrance_examinations = $request->reserve_days_entrance_examinations;
        $data->results_commission = $request->results_commission;
        
        $data->save();
        
        return redirect()->route('admin.period.index');
    }
    
    public function edit($id)
    {
        $data = Period::find($id);
        $props  = PropertyColumn::where('table', 'periods')->get(['id', 'name', 'value']);
        
        return view('admin.periods.edit', [
            'data'          => $data,
            'props'         => $props,
            'degrees'       => Degree::all(),
            'directions'    => Direction::all(),
            'faculties'     => Faculty::all(),
            'forms'         => Form::all(),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $days_enrollment_orders = [];
        $days_end_submission_document_education = [];
                
        foreach($request->days_end_submission_document_education as $k => $v) {
            if($v !== null)
                $days_end_submission_document_education[] = (int)$v;
        }
        
        foreach($request->days_enrollment_orders as $k => $v) {
            if($v !== null)
                $days_enrollment_orders[] = (int)$v;
        }
        
        $request->validate([
            'type_terms'    => 'required',
            'degree_id'     => 'required',
            'form_id'       => 'required',
            'type_price'    => 'required',
        ]);
        
        $data = Period::find($id);
        
        $data->type_terms = $request->type_terms;
        $data->degree_id = $request->degree_id;
        $data->form_id = $request->form_id;
        $data->type_price = $request->type_price;
        $data->category_applicants = $request->category_applicants;
        $data->category_applicants_combined = $request->category_applicants_combined;
        $data->responsible_filling = $request->responsible_filling;
        $data->start_submission_documents = $request->start_submission_documents;
        $data->end_submission_documents = $request->end_submission_documents;
        $data->days_end_submission_document_education = $days_end_submission_document_education;
        $data->start_conclusion_contracts = $request->start_conclusion_contracts;
        $data->end_conclusion_contracts = $request->end_conclusion_contracts;
        $data->end_payment_contracts = $request->end_payment_contracts;
        $data->formation_lists_applicants = $request->formation_lists_applicants;
        $data->days_enrollment_orders = $days_enrollment_orders;
        $data->start_entrance_examination = $request->start_entrance_examination;
        $data->end_entrance_examination = $request->end_entrance_examination;
        $data->reserve_days_entrance_examinations = $request->reserve_days_entrance_examinations;
        $data->results_commission = $request->results_commission;
        
        $data->save();
        
        return redirect()->route('admin.period.index');
    }
    
    public function destroy($id)
    {
        $data = Period::find($id);
        
        $data->delete();
    }
}

