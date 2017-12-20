<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'id','customer_id','investitor_id','naziv'
		    Schema::create('projects', function (Blueprint $table) {
            $table->unsignedInteger('id');
			$table->integer('investitor_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->string('naziv')->nullable();
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
        //
    }
}
