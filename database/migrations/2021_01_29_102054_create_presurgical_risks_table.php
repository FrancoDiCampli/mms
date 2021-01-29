<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresurgicalRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presurgical_risks', function (Blueprint $table) {
            $table->id();
            $table->string('pathological_history')->nullable();
            $table->string('medication')->nullable();
            $table->string('physical_exam')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('rhythm')->nullable();
            $table->string('frequency')->nullable();
            $table->string('op_axis')->nullable();
            $table->string('op_voltage')->nullable();
            $table->string('op_duration')->nullable();
            $table->string('pr')->nullable();
            $table->string('qrs_axis')->nullable();
            $table->string('qrs_voltage')->nullable();
            $table->string('qrs_duration')->nullable();
            $table->string('qtm')->nullable();
            $table->string('st')->nullable();
            $table->string('wave_t')->nullable();
            $table->boolean('high_risk_surgery')->nullable();
            $table->boolean('history_acv_tia')->nullable();
            $table->boolean('ischemic_heart_disease')->nullable();
            $table->boolean('insulin_dependent_diabetes')->nullable();
            $table->boolean('heart_failure')->nullable();
            $table->boolean('creatine')->nullable();
            $table->boolean('i_risk_factors')->nullable();
            $table->boolean('ii_risk_factor')->nullable();
            $table->boolean('iii_risk_factors')->nullable();
            $table->boolean('iv_or_more_risk_factors')->nullable();
            $table->text('conclusions');
            $table->string('date');
            $table->unsignedBigInteger('patient_id');
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
        Schema::dropIfExists('presurgical_risks');
    }
}
