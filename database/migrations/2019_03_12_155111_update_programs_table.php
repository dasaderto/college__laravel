<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('comment')->after('status');
            $table->float('duration_study', 2, 1)->after('comment');
            $table->float('possible_duration_study', 2, 1)->after('duration_study');
            $table->integer('budget_places')->after('possible_duration_study');
            $table->integer('budget_places_special')->after('budget_places');
            $table->integer('places_target_quota')->after('budget_places_special');
            $table->integer('paid_places')->after('places_target_quota');
            
            $table->float('competition', 8, 2)->after('paid_places');
            $table->float('average_point', 8, 2)->after('competition');
            $table->integer('min_point')->after('average_point');
            $table->float('price', 5, 1)->after('min_point');
            
            $table->string('courses')->after('price');
            
            $table->integer('training_english')->after('courses');
            $table->integer('double_defree_program')->after('training_english');
            $table->integer('accreditation')->after('double_defree_program');
            
            $table->string('educational_process')->after('accreditation');
        });
        /*
        Schema::table('programs', function (Blueprint $table) {
            $table->string('comment')->after('status');
            $table->float('duration_study', 2, 1)->after('comment');
            $table->float('possible_duration_study', 2, 1)->after('duration_study');
            $table->integer('budget_places')->after('possible_duration_study');
            $table->integer('budget_places_special')->after('budget_places');
            $table->integer('places_target_quota')->after('budget_places_special');
            $table->integer('paid_places')->after('places_target_quota');
            
            $table->float('competition', 8, 2)->after('paid_places');
            $table->float('average_point', 8, 2)->after('competition');
            $table->integer('min_point', 6)->after('average_point');
            $table->float('price', 5, 1)->after('min_point');
            
            $table->string('courses')->after('price');
            
            $table->integer('training_english', 1)->after('courses');
            $table->integer('double_defree_program', 1)->after('training_english');
            $table->integer('accreditation', 1)->after('double_defree_program');
            
            $table->string('educational_process')->after('accreditation');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
