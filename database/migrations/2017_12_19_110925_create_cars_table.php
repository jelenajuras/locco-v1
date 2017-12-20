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
			$table->string('proizvođač')->nullable();
			$table->string('model')->nullable();
			$table->string('registracija')->nullable();
			$table->string('šasija')->nullable();
			$table->date('prva_registracija')->nullable();
			$table->date('zadnja_registracija')->nullable();
			$table->date('slijedeća_registracija')->nullable();
			$table->integer('trenutni_kilometri')->nullable();
			$table->date('zadnji_servis')->nullable();
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
