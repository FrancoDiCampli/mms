<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchocardiogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echocardiograms', function (Blueprint $table) {
            $table->id();
            $table->string('ao')->nullable();
            $table->string('ai')->nullable();
            $table->string('ddvi')->nullable();
            $table->string('dsvi')->nullable();
            $table->string('s')->nullable();
            $table->string('pp')->nullable();
            $table->string('mass_vi')->nullable();
            $table->string('massindex_vi')->nullable();
            $table->string('vfd_vi')->nullable();
            $table->string('vfs_vi')->nullable();
            $table->string('vs')->nullable();
            $table->string('fey_vi')->nullable();
            $table->string('ad')->nullable();
            $table->string('vd')->nullable();
            $table->string('tapse')->nullable();
            $table->string('aortic_ring')->nullable();
            $table->string('sinus_portion')->nullable();
            $table->string('sinotubular_union')->nullable();
            $table->string('tubular_portion')->nullable();
            $table->string('pericardium')->nullable();
            $table->string('vci')->nullable();
            $table->string('ivai')->nullable();
            $table->string('minute_volume')->nullable();
            $table->string('cardiac_index')->nullable();
            $table->string('mitral_morphology')->nullable();
            $table->string('mitral_flow_chart')->nullable();
            $table->string('mitral_g_max')->nullable();
            $table->string('mitral_g_medium')->nullable();
            $table->string('mitral_area')->nullable();
            $table->string('aortic_morphology')->nullable();
            $table->string('aortic_tsvi')->nullable();
            $table->string('aortic_vel_tsvi')->nullable();
            $table->string('aortic_vel_ao')->nullable();
            $table->string('aortic_g_max')->nullable();
            $table->string('aortic_g_medium')->nullable();
            $table->string('aortic_area')->nullable();
            $table->string('tricuspidea_morphology')->nullable();
            $table->string('tricuspidea_psp')->nullable();
            $table->string('pulmonary_morphology')->nullable();
            $table->string('pulmonary_t_descac')->nullable();
            $table->string('modality')->nullable();
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
        Schema::dropIfExists('echocardiograms');
    }
}
