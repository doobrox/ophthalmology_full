<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glasses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fk_visits_id');
            $table->string('OD_refracto_dsf')->nullable();
            $table->string('OD_refracto_cyl')->nullable();
            $table->string('OD_refracto_ax')->nullable();
            $table->string('OS_refracto_dsf')->nullable();
            $table->string('OS_refracto_cyl')->nullable();
            $table->string('OS_refracto_ax')->nullable();
            $table->string('DIP_refracto')->nullable();
            $table->string('OD_K1')->nullable();
            $table->string('OD_ax_1')->nullable();
            $table->string('OD_K2')->nullable();
            $table->string('OD_ax_2')->nullable();
            $table->string('OS_K1')->nullable();
            $table->string('OS_ax_1')->nullable();
            $table->string('OS_K2')->nullable();
            $table->string('OS_ax_2')->nullable();
            $table->string('corectie_OD_Dsf')->nullable();
            $table->string('corectie_OD_DCyl')->nullable();
            $table->string('corectie_OD_Ax')->nullable();
            $table->string('corectie_OS_Dsf')->nullable();
            $table->string('corectie_OS_DCyl')->nullable();
            $table->string('corectie_OS_Ax')->nullable();
            $table->string('DIP')->nullable();
            $table->string('aproape_OD_Dsf')->nullable();
            $table->string('aproape_OD_DCyl')->nullable();
            $table->string('aproape_OD_Ax')->nullable();
            $table->string('aproape_OS_Dsf')->nullable();
            $table->string('aproape_OS_DCyl')->nullable();
            $table->string('aproape_OS_Ax')->nullable();
            $table->string('aproape_DIP')->nullable();
            $table->string('user_who_input')->nullable();
            $table->string('MS_pahi_OD')->nullable();
            $table->string('MS_min_OD')->nullable();
            $table->string('MS_max_OD')->nullable();
            $table->string('MS_avg_OD')->nullable();
            $table->string('MS_nr_OD')->nullable();
            $table->string('MS_cv_OD')->nullable();
            $table->string('MS_hex_OD')->nullable();
            $table->string('MS_pahi_OS')->nullable();
            $table->string('MS_min_OS')->nullable();
            $table->string('MS_max_OS')->nullable();
            $table->string('MS_avg_OS')->nullable();
            $table->string('MS_nr_OS')->nullable();
            $table->string('MS_cv_OS')->nullable();
            $table->string('MS_hex_OS')->nullable();
            $table->string('MS_CD_OD')->nullable();
            $table->string('MS_CD_OS')->nullable();
            $table->string('MS_SD_OD')->nullable();
            $table->string('MS_SD_OS')->nullable();
            $table->boolean('ciclopegie')->nullable();
            $table->boolean('kerato')->nullable();
            $table->boolean('refracto')->nullable();
            $table->boolean('microscopie')->nullable();
            $table->boolean('corectie')->nullable();
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
        Schema::dropIfExists('glasses');
    }
}
