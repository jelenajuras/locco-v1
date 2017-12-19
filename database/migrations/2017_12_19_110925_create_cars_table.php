<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
			$table->string('proizvođač');
			$table->string('model');
			$table->string('šasija');
			$table->date('prva_registracija');
			$table->date('zadnja_registracija');
			$table->date('slijedeća_registracija');
			$table->integer('trenutni_kilometri');
			$table->date('zadnji_servis');
			$table->integer('department_id')->nullable();
			$table->integer('user_id')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
