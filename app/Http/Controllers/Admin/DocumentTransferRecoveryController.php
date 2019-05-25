<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\DocumentTransferRecovery;
use App\Period;
use App\Program;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\PropertyColumn;

class DocumentTransferRecoveryController extends Controller
{
    public function index()
    {
        $data   = DocumentTransferRecovery::all();
        $props  = PropertyColumn::where('table', 'documents_transfer_recovery')->get(['id', 'name', 'value']);
        $forms  = array_column(Form::all()->toArray(), null, 'id');
        
        return view('admin.documents_transfer_recovery.index', [
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
        $data = DocumentTransferRecovery::find($id);
        $props  = PropertyColumn::where('table', 'documents_transfer_recovery')->get(['id', 'name', 'value']);
        
        return view('admin.documents_transfer_recovery.show', [
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
        $props = PropertyColumn::where('table', 'documents_transfer_recovery')->get(['id', 'name', 'value']);
        
        return view('admin.documents_transfer_recovery.create', [
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
        $categories_applicants_combined = [];
        $documents = [];
                
        foreach($request->documents as $k => $v) {
            if($v !== null)
                $documents[] = (int)$v;
        }
        
        foreach($request->categories_applicants_combined as $k => $v) {
            if($v !== null)
                $categories_applicants_combined[] = (int)$v;
        }
        
        $request->validate([
            'type_terms'    => 'required',
            'degree_id'     => 'required',
            'form_id'       => 'required',
            'type_price'    => 'required',
        ]);
        
        $data = new DocumentTransferRecovery();
        
        $data->type_terms = $request->type_terms;
        $data->degree_id = $request->degree_id;
        $data->form_id = $request->form_id;
        
        $data->type_price = $request->type_price;
        $data->category_applicants = $request->category_applicants;
        $data->categories_applicants_combined = $categories_applicants_combined;
        $data->responsible_filling = $request->responsible_filling;
        
        $data->documents = $documents;
        
        $data->save();
        
        return redirect()->route('admin.document_transfer_recovery.index');
    }
    
    public function edit($id)
    {
        $data   = DocumentTransferRecovery::find($id);
        $props  = PropertyColumn::where('table', 'documents_transfer_recovery')->get(['id', 'name', 'value']);
        
        return view('admin.documents_transfer_recovery.edit', [
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
        $categories_applicants_combined = [];
        $documents = [];
        
        foreach($request->documents as $k => $v) {
            if($v !== null)
                $documents[] = (int)$v;
        }
        
        foreach($request->categories_applicants_combined as $k => $v) {
            if($v !== null)
                $categories_applicants_combined[] = (int)$v;
        }
        
        $request->validate([
            'type_terms'    => 'required',
            'degree_id'     => 'required',
            'form_id'       => 'required',
            'type_price'    => 'required',
        ]);
        
        $data = DocumentTransferRecovery::find($id);
        
        $data->type_terms = $request->type_terms;
        $data->degree_id = $request->degree_id;
        $data->form_id = $request->form_id;
        
        $data->type_price = $request->type_price;
        $data->category_applicants = $request->category_applicants;
        $data->categories_applicants_combined = $categories_applicants_combined;
        $data->responsible_filling = $request->responsible_filling;
        
        $data->documents = $documents;

        $data->save();
        
        return redirect()->route('admin.document_transfer_recovery.index');
    }
    
    public function destroy($id)
    {
        $data = DocumentTransferRecovery::find($id);
        
        $data->delete();
    }
}

