<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoArterialLowerMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_arterial_lower_members', function (Blueprint $table) {
            $table->id();
            $table->float('r_common_femoral');
            $table->float('r_superficial_femoral');
            $table->float('r_poplitea');
            $table->float('r_tibialis_anterior');
            $table->float('r_tibialis_posterior');
            $table->float('r_pedia');
            $table->float('l_common_femoral');
            $table->float('l_superficial_femoral');
            $table->float('l_poplitea');
            $table->float('l_tibialis_anterior');
            $table->float('l_tibialis_posterior');
            $table->float('l_pedia');
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
        Schema::dropIfExists('eco_arterial_lower_members');
    }
}
