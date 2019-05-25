<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFaqs=Faq::all();

        return view('admin.faqs.index',[
            'allFaqs' => $allFaqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question__title' =>'required',
            'question__answer' => 'required'
        ]);

        $faq = new Faq([
            'que_title' => $request->get('question__title'),
            'answer' => $request->get('question__answer')
        ]);

        $faq->save();
        return redirect('/admin/faq')->with('success', 'Questions has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);

        return view('admin.faqs.show',compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);

        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'que__title' =>'required',
            'que__answer' => 'required'
        ]);

        $faq = Faq::find($id);
        $faq->que_title = $request->get('que__title');
        $faq->answer = $request->get('que__answer');

        $faq->save();

        return redirect('/admin/faq')->with('success', 'Questions has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);

        $faq->delete();

        return redirect('/admin/faq')->with('success', 'Questions has been deleted.');
    }
}
