<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('procedure_medical_name');
            $table->decimal('procedure_price', $precision = 16, $scale = 6);
            $table->string('procedure_diagnostic')->nullable();
            $table->string('procedure_description')->nullable();
            $table->string('procedure_recommendation')->nullable();
            $table->string('procedure_treatment')->nullable();
            $table->string('procedure_code')->nullable();
            $table->decimal('procedure_discount', $precision = 16, $scale = 6)->nullable();
            $table->decimal('procedure_advance', $precision = 16, $scale = 6)->nullable();
            $table->integer('procedure_points')->nullable();
            $table->boolean('need_crystalline')->default('0');
            $table->boolean('is_cas')->default('0');
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
        Schema::dropIfExists('procedures');
    }
}
