<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrograms2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs2', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->integer('degree_id');
            $table->integer('faculty_id');
            $table->integer('direction_id');
            $table->string('form_ids');
            $table->integer('status');
            
            $table->string('comment');
            $table->string('duration_study');
            $table->string('possible_duration_study');
            $table->integer('budget_places');
            $table->integer('budget_places_special');
            $table->integer('places_target_quota');
            $table->integer('paid_places');
            
            $table->string('competition');
            $table->string('average_point');
            $table->integer('min_point');
            $table->string('price');
            
            $table->string('courses');
            
            $table->integer('training_english');
            $table->integer('double_defree_program');
            $table->integer('accreditation');
            
            $table->string('educational_process');
            
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
        Schema::dropIfExists('programs2');
    }
}
