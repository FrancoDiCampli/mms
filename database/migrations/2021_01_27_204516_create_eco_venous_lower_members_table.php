<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoVenousLowerMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_venous_lower_members', function (Blueprint $table) {
            $table->id();
            $table->string('r_svp_common_femoral_vein')->nullable();
            $table->string('r_svp_popliteal_vein')->nullable();
            $table->string('r_svp_twin_veins')->nullable();
            $table->string('r_svp_peroneal_veins')->nullable();
            $table->string('r_svs_safena_magna_vein')->nullable();
            $table->string('r_svs_safena_parva_vein')->nullable();
            $table->string('l_svp_common_femoral_vein')->nullable();
            $table->string('l_svp_popliteal_vein')->nullable();
            $table->string('l_svp_twin_veins')->nullable();
            $table->string('l_svp_peroneal_veins')->nullable();
            $table->string('l_svs_safena_magna_vein')->nullable();
            $table->string('l_svs_safena_parva_vein')->nullable();
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
        Schema::dropIfExists('eco_venous_lower_members');
    }
}
