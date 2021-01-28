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
            $table->float('rhythm');
            $table->float('frequency');
            $table->float('op_axis');
            $table->float('op_voltage');
            $table->float('op_duration');
            $table->float('pr');
            $table->float('qrs_axis');
            $table->float('qrs_voltage');
            $table->float('qrs_duration');
            $table->float('qtm');
            $table->float('st');
            $table->float('wave_t');
            $table->text('conclusions');
            $table->string('date');
            $table->unsignedBigInteger('patient_id');
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
