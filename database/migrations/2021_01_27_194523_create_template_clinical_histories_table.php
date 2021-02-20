<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateClinicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_clinical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reason_consult');
            $table->text('current_disease_history');
            $table->string('overall_status');
            $table->string('respiratory_system');
            $table->string('cardiovascular_system');
            $table->string('abdomen');
            $table->string('diagnostic');
            $table->text('study_plan');
            $table->string('treatment');
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
        Schema::dropIfExists('template_clinical_histories');
    }
}
