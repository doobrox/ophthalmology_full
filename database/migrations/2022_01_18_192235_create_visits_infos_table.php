<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_visits_id');
            $table->timestamp('visit_info_date')->useCurrent();
            $table->string('diagnostic_description');
            $table->string('diagnostic_secondary_description');
            $table->string('diagnostic_other_description');
            $table->string('drug_treatment_description');
            $table->string('drug_medical_letter_description');
            $table->string('reason_description');
            $table->string('treatment_scheme_description');
            $table->string('biomicroscopie_ry_description');
            $table->string('biomicroscopie_ly_description');
            $table->string('eye_bottom_description');
            $table->string('eye_bottom_extra_description');
            $table->string('historical_procedures_description');
            $table->string('gonioscopie_ry_description');
            $table->string('gonioscopie_ly_description');
            $table->string('visual_field_ry_description');
            $table->string('visual_field_ly_description');
            $table->string('visit_comments');
            $table->string('av_ry');
            $table->string('t_ry_non_c');
            $table->string('t_ry_c');
            $table->string('ry_cv_md');
            $table->string('ry_cv_pd');
            $table->string('av_ly');
            $table->string('t_ly_non_c');
            $table->string('t_ly_c');
            $table->string('ly_cv_md');
            $table->string('ly_cv_pd');
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
        Schema::dropIfExists('visits_infos');
    }
}
