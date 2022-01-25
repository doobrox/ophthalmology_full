<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures_has_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_procedure_id');
            $table->integer('fk_user_id');
            $table->decimal('procedure_price', $precision = 16, $scale = 6);
            $table->decimal('procedure_discount', $precision = 16, $scale = 6)->nullable();
            $table->decimal('procedure_advance', $precision = 16, $scale = 6)->nullable();  $table->integer('procedure_points')->nullable();
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
        Schema::dropIfExists('procedures_for_users');
    }
}
