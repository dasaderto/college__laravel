<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTransferRecoveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_transfer_recovery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_terms');
            $table->integer('degree_id');
            $table->integer('form_id');
            
            $table->string('type_price');
            $table->string('category_applicants');
            $table->text('categories_applicants_combined');
            $table->string('responsible_filling');
            
            $table->text('documents');
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
        Schema::dropIfExists('documents_transfer_recovery');
    }
}
