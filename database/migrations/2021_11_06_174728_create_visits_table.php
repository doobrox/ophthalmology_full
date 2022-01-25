<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_patient_id');
            $table->timestamp('visit_date')->useCurrent();
            $table->integer('consultation_form_number');
            $table->integer('fk_doctor_assigned_to_patient');
            $table->integer('fk_doctor_casmb_assigned_to_patient')->nullable();
            $table->integer('fk_select_procedure_type');
            $table->boolean('is_casmb')->default(0);
            $table->string('user_who_input');
            $table->timestamp('patient_arrival_time')->useCurrent();
            $table->integer('visit_status');
            $table->integer('duration_between_exams')->default(0);
            $table->integer('duration_of_the_first_examination')->default(0);
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
        Schema::dropIfExists('visits');
    }
}
