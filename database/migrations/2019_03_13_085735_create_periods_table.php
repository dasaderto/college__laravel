<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_terms');
            $table->integer('degree_id');
            $table->integer('form_id');
            
            $table->string('type_price');
            $table->string('category_applicants');
            $table->string('category_applicants_combined');
            $table->string('responsible_filling');
            
            $table->string('start_submission_documents');
            $table->string('end_submission_documents');
            $table->string('days_end_submission_document_education');
            
            $table->string('start_conclusion_contracts');
            $table->string('end_conclusion_contracts');
            $table->string('end_payment_contracts');
            
            $table->string('formation_lists_applicants');
            
            $table->string('days_enrollment_orders');
            
            $table->string('start_entrance_examination');
            $table->string('end_entrance_examination');
            $table->string('reserve_days_entrance_examinations');
            
            $table->string('results_commission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
