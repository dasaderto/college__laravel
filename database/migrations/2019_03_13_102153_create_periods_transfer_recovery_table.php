<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTransferRecoveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods_transfer_recovery', function (Blueprint $table) {
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
            $table->text('methods_submission_documents');

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
        Schema::dropIfExists('periods_transfer_recovery');
    }
}
