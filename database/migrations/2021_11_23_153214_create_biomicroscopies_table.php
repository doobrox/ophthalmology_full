<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiomicroscopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biomicroscopies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('biomicroscopie_short_name');
            $table->string('biomicroscopie_name');
            $table->string('biomicroscopie_details');
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
        Schema::dropIfExists('biomicroscopies');
    }
}
