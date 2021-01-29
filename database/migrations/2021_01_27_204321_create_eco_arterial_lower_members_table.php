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
            $table->string('r_common_femoral')->nullable();
            $table->string('r_common_femoral_description')->nullable();
            $table->string('r_superficial_femoral')->nullable();
            $table->string('r_superficial_femoral_description')->nullable();
            $table->string('r_poplitea')->nullable();
            $table->string('r_poplitea_description')->nullable();
            $table->string('r_tibialis_anterior')->nullable();
            $table->string('r_tibialis_anterior_description')->nullable();
            $table->string('r_tibialis_posterior')->nullable();
            $table->string('r_tibialis_posterior_description')->nullable();
            $table->string('r_pedia')->nullable();
            $table->string('r_pedia_description')->nullable();
            $table->string('l_common_femoral')->nullable();
            $table->string('l_common_femoral_description')->nullable();
            $table->string('l_superficial_femoral')->nullable();
            $table->string('l_superficial_femoral_description')->nullable();
            $table->string('l_poplitea')->nullable();
            $table->string('l_poplitea_description')->nullable();
            $table->string('l_tibialis_anterior')->nullable();
            $table->string('l_tibialis_anterior_description')->nullable();
            $table->string('l_tibialis_posterior')->nullable();
            $table->string('l_tibialis_posterior_description')->nullable();
            $table->string('l_pedia')->nullable();
            $table->string('l_pedia_description')->nullable();
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
        Schema::dropIfExists('eco_arterial_lower_members');
    }
}
