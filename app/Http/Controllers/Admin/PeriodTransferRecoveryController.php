<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\PeriodTransferRecovery;
use App\Period;
use App\Program;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\PropertyColumn;

class PeriodTransferRecoveryController extends Controller
{
    public function index()
    {
        $data = PeriodTransferRecovery::all();
        $props  = PropertyColumn::where('table', 'periods_transfer_recovery')->get(['id', 'name', 'value']);
        $forms = array_column(Form::all()->toArray(), null, 'id');
        

        return view('admin.periods_transfer_recovery.index', [
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
        $data = PeriodTransferRecovery::find($id);
        $props  = PropertyColumn::where('table', 'periods_transfer_recovery')->get(['id', 'name', 'value']);
        
        return view('admin.periods_transfer_recovery.show', [
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
        $props  = PropertyColumn::where('table', 'periods_transfer_recovery')->get(['id', 'name', 'value']);
        
        return view('admin.periods_transfer_recovery.create', [
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
        $methods_submission_documents = [];
                
        foreach($request->methods_submission_documents as $k => $v) {
            if($v !== null)
                $methods_submission_documents[] = (int)$v;
        }
        
        $request->validate([
            'type_terms'    => 'required',
            'degree_id'     => 'required',
            'form_id'       => 'required',
            'type_price'    => 'required',
        ]);
        
        $data = new PeriodTransferRecovery();
        
        $data->type_terms = $request->type_terms;
        $data->degree_id = $request->degree_id;
        $data->form_id = $request->form_id;
        
        $data->type_price = $request->type_price;
        $data->category_applicants = $request->category_applicants;
        $data->category_applicants_combined = $request->category_applicants_combined;
        $data->responsible_filling = $request->responsible_filling;
        
        $data->start_submission_documents = $request->start_submission_documents;
        $data->end_submission_documents = $request->end_submission_documents;
        $data->methods_submission_documents = $methods_submission_documents;
        
        $data->results_commission = $request->results_commission;
        
        $data->save();
        
        return redirect()->route('admin.period_transfer_recovery.index');
    }
    
    public function edit($id)
    {
        $data = PeriodTransferRecovery::find($id);
        $props  = PropertyColumn::where('table', 'periods_transfer_recovery')->get(['id', 'name', 'value']);
        
        return view('admin.periods_transfer_recovery.edit', [
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
        $methods_submission_documents = [];
                
        foreach($request->methods_submission_documents as $k => $v) {
            if($v !== null)
                $methods_submission_documents[] = (int)$v;
        }
        
        $request->validate([
            'type_terms'    => 'required',
            'degree_id'     => 'required',
            'form_id'       => 'required',
            'type_price'    => 'required',
        ]);
        
        $data = PeriodTransferRecovery::find($id);
        
        $data->type_terms = $request->type_terms;
        $data->degree_id = $request->degree_id;
        $data->form_id = $request->form_id;
        
        $data->type_price = $request->type_price;
        $data->category_applicants = $request->category_applicants;
        $data->category_applicants_combined = $request->category_applicants_combined;
        $data->responsible_filling = $request->responsible_filling;
        
        $data->start_submission_documents = $request->start_submission_documents;
        $data->end_submission_documents = $request->end_submission_documents;
        $data->methods_submission_documents = $methods_submission_documents;
        
        $data->results_commission = $request->results_commission;

        $data->save();
        
        return redirect()->route('admin.period_transfer_recovery.index');
    }
    
    public function destroy($id)
    {
        $data = PeriodTransferRecovery::find($id);
        
        $data->delete();
    }
}

