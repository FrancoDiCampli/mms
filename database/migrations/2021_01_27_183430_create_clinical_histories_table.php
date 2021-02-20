<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_histories', function (Blueprint $table) {
            $table->id();
            $table->text('ant_medical')->nullable();
            $table->text('ant_surgical')->nullable();
            $table->string('reason_consult');
            $table->text('current_disease_history');
            $table->string('overall_status');
            $table->string('respiratory_system');
            $table->string('cardiovascular_system');
            $table->string('abdomen');
            $table->string('diagnostic');
            $table->text('study_plan');
            $table->string('treatment');
            $table->string('hospitalization_date');
            $table->string('discharge_date');
            $table->string('weight');
            $table->string('height');
            $table->boolean('type_intervention');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sanatorio_id');
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
        Schema::dropIfExists('clinical_histories');
    }
}
