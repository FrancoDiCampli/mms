<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoArterialNecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_arterial_necks', function (Blueprint $table) {
            $table->id();
            $table->float('r_common_carotid');
            $table->float('r_internal_carotid');
            $table->float('r_vertebral');
            $table->float('l_common_carotid');
            $table->float('l_internal_carotid');
            $table->float('l_vertebral');
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
        Schema::dropIfExists('eco_arterial_necks');
    }
}
