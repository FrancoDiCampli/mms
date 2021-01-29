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
            $table->string('r_common_carotid')->nullable();
            $table->string('r_common_carotid_description')->nullable();
            $table->string('r_internal_carotid')->nullable();;
            $table->string('r_internal_carotid_description')->nullable();
            $table->string('r_vertebral')->nullable();
            $table->string('r_vertebral_description')->nullable();
            $table->string('l_common_carotid')->nullable();
            $table->string('l_common_carotid_description')->nullable();
            $table->string('l_internal_carotid')->nullable();
            $table->string('l_internal_carotid_description')->nullable();
            $table->string('l_vertebral')->nullable();
            $table->string('l_vertebral_description')->nullable();
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
        Schema::dropIfExists('eco_arterial_necks');
    }
}
