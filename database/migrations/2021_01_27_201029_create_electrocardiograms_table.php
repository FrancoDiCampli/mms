<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectrocardiogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrocardiograms', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('electrocardiograms');
    }
}
