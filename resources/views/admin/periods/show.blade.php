@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Срок поступления: #{{$period->id}}</h1>
                <a href="{{ route('admin.period.edit', $period->id) }}" class="btn btn-primary ml-auto"><i class="fas fa-pen"></i> Редактировать</a>
            </div>
            
            <table class="border table table-borderless table-light">
                <tbody class="periods_container">
                    <tr><td>Вид срока</td><td>{{$period->type_terms}}</td></tr>
                    <tr><td>Тип обучения</td><td>{{$period->degree->name}}</td></tr>
                    <tr><td>Форма обучения</td><td>{{$period->form_id}}</td></tr>
                    <tr><td>Бюджет/платка</td><td>{{$period->type_price}}</td></tr>
                    <tr><td>Категория поступающиего</td><td>{{$period->category_applicants}}</td></tr>
                    <tr><td>Совокупная категория поступающего (при наличии)</td><td>{{$period->category_applicants_combined}}</td></tr>
                    <tr><td>Ответственный за заполнение</td><td>{{$period->responsible_filling}}</td></tr>
                    <tr><td>Начало подачи документов</td><td>{{$period->start_submission_documents}}</td></tr>
                    <tr><td>Окончание подачи документов</td><td>{{$period->end_submission_documents}}</td></tr>
                    <tr><td>Последнии дни подачи оригиналов документа об образовании <br>(первый и второй этап)</td><td>@foreach($period->days_end_submission_document_education as $p) {{$p}} @endforeach</td></tr>
                    <tr><td>Начало заключения договоров</td><td>{{$period->start_conclusion_contracts}}</td></tr>
                    <tr><td>Окончание заключения договоров</td><td>{{$period->end_conclusion_contracts}}</td></tr>
                    <tr><td>Последний день оплаты договоров на 2018 год</td><td>{{$period->end_payment_contracts}}</td></tr>
                    <tr><td>Формирование списков поступающих</td><td>{{$period->formation_lists_applicants}}</td></tr>
                    <tr><td>Первый и второй этапы приказов о зачислении</td><td>@foreach($period->days_enrollment_orders as $p) {{$p}} @endforeach</td></tr>
                    <tr><td>Начало вступительных испытаний</td><td>{{$period->start_entrance_examination}}</td></tr>
                    <tr><td>Окончание вступительных испытаний</td><td>{{$period->end_entrance_examination}}</td></tr>
                    <tr><td>Резервные дни вступительных испытаний</td><td>{{$period->reserve_days_entrance_examinations}}</td></tr>
                    <tr><td>Вынесение результатов комиссией</td><td>{{$period->results_commission}}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection