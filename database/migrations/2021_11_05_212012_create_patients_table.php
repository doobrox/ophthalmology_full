<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_name');
            $table->string('patient_forename');
            $table->timestamp('patient_date_of_registration')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('patient_locality')->nullable();
            $table->string('patient_street')->nullable();
            $table->string('patient_number')->nullable();
            $table->string('patient_phone')->nullable();
            $table->string('patient_phone_second')->nullable();
            $table->string('patient_email')->nullable();
            $table->date('patient_date_of_birth')->nullable();
            $table->integer('patient_age')->nullable();
            $table->string('patient_name_and_forename')->nullable();
            $table->string('user_who_input')->nullable();
            $table->string('patient_cnp')->nullable();
            $table->string('patient_document')->nullable();
            $table->string('patient_series')->nullable();
            $table->string('patient_document_number')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
