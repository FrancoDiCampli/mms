<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulatoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambulatories', function (Blueprint $table) {
            $table->id();
            $table->string('authorization');
            $table->string('authorization_code');
            $table->string('diagnostic');
            $table->string('date');
            $table->unsignedBigInteger('clinical_history_id');
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
        Schema::dropIfExists('ambulatories');
    }
}
