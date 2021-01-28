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
            $table->float('ao');
            $table->float('ai');
            $table->float('ddvi');
            $table->float('dsvi');
            $table->float('s');
            $table->float('pp');
            $table->float('mass_vi');
            $table->float('massindex_vi');
            $table->float('vfd_vi');
            $table->float('vfs_vi');
            $table->float('vs');
            $table->float('fey_vi');
            $table->float('ad');
            $table->float('vd');
            $table->float('tapse');
            $table->float('aortic_ring');
            $table->float('sinus_portion');
            $table->float('sinotubular_union');
            $table->float('tubular_portion');
            $table->float('pericardium');
            $table->float('vci');
            $table->float('ivai');
            $table->float('minute_volume');
            $table->float('cardiac_index');
            $table->float('mitral_morphology');
            $table->float('mitral_flow_chart');
            $table->float('mitral_g_max');
            $table->float('mitral_g_medium');
            $table->float('mitral_area');
            $table->float('aortic_morphology');
            $table->float('aortic_tsvi');
            $table->float('aortic_vel_tsvi');
            $table->float('aortic_vel_ao');
            $table->float('aortic_g_max');
            $table->float('aortic_g_medium');
            $table->float('aortic_area');
            $table->float('tricuspidea_morphology');
            $table->float('tricuspidea_psp');
            $table->float('pulmonary_morphology');
            $table->float('pulmonary_t_descac');
            $table->string('modality');
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
        Schema::dropIfExists('echocardiograms');
    }
}
