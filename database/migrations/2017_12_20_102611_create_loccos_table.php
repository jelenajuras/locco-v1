<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoccosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loccos', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('vozilo_id')->nullable(false);
			$table->date('datum')->nullable(false);
			$table->integer('user_id')->nullable(false);
			$table->string('relacija')->nullable(false);
			$table->integer('projekt_id')->nullable();
			$table->string('razlog_puta')->nullable();
			$table->integer('početni_kilometri')->nullable(false);
			$table->integer('završni_kilometri')->nullable(false);
			$table->integer('prijeđeni_kilometri')->nullable();
			$table->string('Komentar')->nullable();
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
        Schema::dropIfExists('loccos');
    }
}
