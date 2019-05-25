<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Program;
use App\Degree;
use App\Direction;
use App\Faculty;
use App\Form;
use App\Period;
use App\PeriodTransferRecovery;
use App\DocumentTransferRecovery;

class ParseController extends Controller
{
    public function __construct()
    {
        $this->links();
    }
    public function programs()
    {
        $data = json_decode(file_get_contents(asset('storage/programs/programs.json')));
        dump([$data]);
        
        $data_degrees = [];
        $data_directions = [];
        $data_forms = [];
        $data_faculties = [
            'unique' => [],
            'data' => [],
        ];
        $data_programs = [];
        
        $degrees = array_column(Degree::all()->toArray(), 'id', 'name');
        $directions = array_column(Direction::all()->toArray(), 'id', 'name');
        $forms = array_column(Form::all()->toArray(), 'id', 'name');
        $faculties = array_column(Faculty::all()->toArray(), 'id', 'name');
        
        $i = 0;
        foreach($data as $item) {
            $item[0] = $degrees[$item[0]];
            $item[1] = $directions[$item[1]];
            //$item[2] = $forms[$item[2]];
            if($item[2] === 'Очное')$item[2] = $forms['Очно'];
            if($item[2] === 'Очно - Заочное')$item[2] = $forms['Очно-заочно'];
            if($item[2] === 'Заочное')$item[2] = $forms['Заочно'];
            if($item[2] === 'Дистанционное')$item[2] = $forms['Дистанционно'];
            $item[3] = $faculties[$item[3]];
            /*
            if(!in_array($item[0], $data_degrees))
                $data_degrees[] = $item[0];
            if(!in_array($item[1], $data_directions))
                $data_directions[] = $item[1];
            */
            if(null === 'disabled' && !in_array($item[3], $data_faculties['unique'])) {
                $data_faculties['unique'][] = $item[3];
                $data_faculties['data'][$item[3]] = [
                    $item[17],
                    $item[18],
                    $item[19],
                    [],
                ];
                if(isset($item[20]) && $item[20] !== '-' && $item[20] !== '?')
                    $data_faculties['data'][$item[3]][3][] = $item[20];
                if(isset($item[21]) && $item[21] !== '-' && $item[21] !== '?')
                    array_push($data_faculties['data'][$item[3]][3], $item[21]);
                if(isset($item[22]) && $item[22] !== '-' && $item[22] !== '?')
                    array_push($data_faculties['data'][$item[3]][3], $item[22]);
            }
            if($i < 1)
                dump([$item]);
            
            if(isset($item[27]))
                $item[26] = [$item[26], $item[27]];
            else
                $item[26] = [$item[26]];
            
            $data_programs[] = $item;
            $i++;
        }
        /*
        foreach(Faculty::all() as $model) {
            $id = $model->id;
            
            $model->address = $data_faculties['data'][$id][0];
            $model->metro = $data_faculties['data'][$id][1];
            $model->deccan = $data_faculties['data'][$id][2];
            $model->phones = $data_faculties['data'][$id][3];
            
            //$model->save();
        }
        */
        /*
        $p_item = $data_programs;
        for($i = 0; $i < count($data_programs); $i++) {
            $table = new Program();
            
            $table->name = $p_item[$i][4];
            $table->degree_id = $p_item[$i][0];
            $table->direction_id = $p_item[$i][0];
            $table->faculty_id = $p_item[$i][3];
            $table->form_ids = [$p_item[$i][2]];
            $table->status = $p_item[$i][5];
            $table->comment = '';
            $table->duration_study = $p_item[$i][6];
            $table->possible_duration_study = $p_item[$i][7];
            $table->budget_places = $p_item[$i][8];
            $table->budget_places_special = $p_item[$i][9];
            $table->places_target_quota = $p_item[$i][10];
            $table->paid_places = $p_item[$i][11];
            $table->competition = $p_item[$i][12];
            $table->average_point = $p_item[$i][13];
            $table->min_point = $p_item[$i][14];
            $table->price = $p_item[$i][15];
            $table->courses = $p_item[$i][16];
            $table->training_english = $p_item[$i][23];
            $table->double_defree_program = $p_item[$i][24];
            $table->accreditation = $p_item[$i][25];
            $table->educational_process = $p_item[$i][26];
            
            //$table->save();
        }
        */
    }
    
    public function periods()
    {
        $data = json_decode(file_get_contents(asset('storage/times.json')));
        dump($data[0]);
        dump([$data]);
        
        $data_degrees = [];
        $data_forms = [];
        
        $degrees = array_column(Degree::all()->toArray(), 'id', 'name');
        $forms = array_column(Form::all()->toArray(), 'id', 'name');
        
        $i = 0;
        foreach($data as $item) {
            $item[1] = $degrees[$item[1]];
            if($item[2] === 'Очное')$item[2] = $forms['Очно'];
            if($item[2] === 'Очно - Заочное' || $item[2] ===  'Очно-Заочное')$item[2] = $forms['Очно-заочно'];
            if($item[2] === 'Заочное')$item[2] = $forms['Заочно'];
            if($item[2] === 'Дистанционное')$item[2] = $forms['Дистанционно'];
            
            $item[11] = [$item[11], $item[12]];
            $item[14] = [$item[14], $item[15]];
            
            $data[$i] = $item;
            $i++;
        }
        
        dump($data[0]);
        dump([$data]);
        
        foreach($data as $item){
            
            $model = new Period();
            
            $model->type_terms = $item[0];
            $model->degree_id = $item[1];
            $model->form_id = $item[2];
            
            $model->type_price = $item[3];
            $model->category_applicants = $item[4];
            $model->category_applicants_combined = $item[5];
            $model->responsible_filling = '-';
            
            $model->start_submission_documents = $item[6];
            $model->end_submission_documents = $item[7];
            $model->days_end_submission_document_education = $item[11];
            
            $model->start_conclusion_contracts = $item[8];
            $model->end_conclusion_contracts = $item[9];
            $model->end_payment_contracts = $item[10];
            
            $model->formation_lists_applicants = $item[13];
            
            $model->days_enrollment_orders = $item[14];
            
            $model->start_entrance_examination = $item[16];
            $model->end_entrance_examination = $item[17];
            $model->reserve_days_entrance_examinations = $item[18];
            
            $model->results_commission = $item[19];
            
            //$model->save();
        }
    }
    public function documents_transfer_recovery()
    {
        $data = json_decode(file_get_contents(asset('storage/docs_transfer_recovery.json')));
        dump($data[0]);
        dump([$data]);
        
        $data_degrees = [];
        $data_forms = [];
        
        $degrees = array_column(Degree::all()->toArray(), 'id', 'name');
        $forms = array_column(Form::all()->toArray(), 'id', 'name');
        
        $i = 0;
        foreach($data as $item) {
            $item[1] = $degrees[$item[1]];
            if($item[2] === 'Очное')$item[2] = $forms['Очно'];
            if($item[2] === 'Очно - Заочное' || $item[2] ===  'Очно-Заочное')$item[2] = $forms['Очно-заочно'];
            if($item[2] === 'Заочное')$item[2] = $forms['Заочно'];
            if($item[2] === 'Дистанционное')$item[2] = $forms['Дистанционно'];
            
            $item[5] = [$item[5], $item[6]];
            $item[8] = [$item[8], $item[9], $item[10], $item[11]];
            
            $data[$i] = $item;
            $i++;
        }
        
        dump($data[0]);
        dump([$data]);
        
        foreach($data as $item){
            $model = new DocumentTransferRecovery();
            
            $model->type_terms = $item[0];
            $model->degree_id = $item[1];
            $model->form_id = $item[2];
            
            $model->type_price = $item[3];
            $model->category_applicants = $item[4];
            $model->categories_applicants_combined = $item[5];
            $model->responsible_filling = $item[7];
            
            $model->documents = $item[8];
            
            //$model->save();
        }
    }
    public function periods_transfer_recovery()
    {
        $data = json_decode(file_get_contents(asset('storage/times_transfer_recovery.json')));
        dump($data[0]);
        dump([$data]);
        
        $data_degrees = [];
        $data_forms = [];
        
        $degrees = array_column(Degree::all()->toArray(), 'id', 'name');
        $forms = array_column(Form::all()->toArray(), 'id', 'name');
        
        $i = 0;
        foreach($data as $item) {
            $item[1] = $degrees[$item[1]];
            if($item[2] === 'Очное')$item[2] = $forms['Очно'];
            if($item[2] === 'Очно - Заочное' || $item[2] ===  'Очно-Заочное')$item[2] = $forms['Очно-заочно'];
            if($item[2] === 'Заочное')$item[2] = $forms['Заочно'];
            if($item[2] === 'Дистанционное')$item[2] = $forms['Дистанционно'];
            
            $item[8] = [$item[8], $item[9]];
            
            $data[$i] = $item;
            $i++;
        }
        
        dump($data[0]);
        dump([$data]);
        
        foreach($data as $item){
            $model = new PeriodTransferRecovery();
            
            $model->type_terms = $item[0];
            $model->degree_id = $item[1];
            $model->form_id = $item[2];
            
            $model->type_price = $item[3];
            $model->category_applicants = $item[4];
            $model->category_applicants_combined = $item[5];
            $model->responsible_filling = '-';
            
            $model->start_submission_documents = $item[6];
            $model->end_submission_documents = $item[7];
            $model->methods_submission_documents = $item[8];
            
            $model->results_commission = $item[10];
            
            //$model->save();
        }
    }
    public function links()
    {
        ?>
        <a href="<?= route('admin.parse_programs.index'); ?>" style="margin-right: 25px;">Программы</a>
        <a href="<?= route('admin.parse_periods.index'); ?>" style="margin-right: 25px;">Сроки поступления</a>
        <a href="<?= route('admin.parse_documents_transfer_recovery.index'); ?>" style="margin-right: 25px;">Документы перевода/восстановления</a>
        <a href="<?= route('admin.parse_periods_transfer_recovery.index'); ?>">Сроки перевода/восстановления</a>
        <?php
    }
    public function store(Request $request)
    {
        $form = new Form();
        $form->name = $request->name;
        $form->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        //$form->save();
    }
    
    public function update(Request $request, $id)
    {
        $form = Form::find($id);
        $form->name = $request->name;
        $form->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        //$form->save();
    }
    
    public function data_times()
    {
        ?>
        Вид сроков.Тип обучения.Форма обучения.Бюджет/платка.
        Категория поступающиего.Совокупная категория поступающего (при наличии).
        Ответственный за заполнение.
        Начало подачи документов.Окончание подачи документов.
        Начало заключения договоров.Окончание заключения договоров.
        Последний день оплаты договоров на 2018 год.
        Последний день подачи оригиналов документа об образовании (первый этап).Последний день подачи оригиналов документа об образовании (второй этап).
        Формирование списков поступающих.
        Первый этап приказов о зачислении.Второй этап приказов о зачислении.
        Начало вступительных испытаний.Окончание вступительных испытаний.
        Резервные дни вступительных испытаний.
        Вынесение результатов комиссией
        
        type_terms.degree_id.form_id.type_price.
        category_applicants.category_applicants_combined.
        responsible_filling.
        start_submission_documents.end_submission_documents.
        start_conclusion_contracts.end_conclusion_contracts.
        end_payment_contracts.
        [days_end_submission_document_education].
        formation_lists_applicants.
        [days_enrollment_orders].
        start_entrance_examination.end_entrance_examination.
        reserve_days_entrance_examinations.
        results_commission.
    <?php
    }
    public function data_docs_transfer_recovery()
    {
        ?>
        Вид сроков.Тип обучения.Форма обучения.Бюджет/платка.
        Категория поступающиего.Совокупная категория поступающего 1.Совокупная категория поступающего 2.
        Ответственный за заполнение.
        Документы 1.Документы 2.Документы 3.Документы 4.Документы 5.Документы 6.Документы 7
        
        type_terms.degree.form.type_price.
        category_applicants.[categories_applicants_combined].
        responsible_filling.
        [documents].
    <?php
    }
    public function data_times_transfer_recovery()
    {
        ?>
        Вид сроков.Тип обучения.Форма обучения.Бюджет/платка.
        Категория поступающиего.Совокупная категория поступающего (при наличии).
        Ответственный за заполнение.
        Начало подачи документов.Окончание подачи документов.
        Способ подачи документов 1.Способ подачи документов 2.Вынесение результатов комиссией
        
        type_terms.degree.form.type_price.
        category_applicants.category_applicants_combined.
        responsible_filling.
        start_submission_documents.end_submission_documents.
        [methods_submission_documents].
        results_commission.
    <?php
    }
}

