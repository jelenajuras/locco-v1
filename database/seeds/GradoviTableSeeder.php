<?php

use Illuminate\Database\Seeder;

class GradoviTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'id'=>'10000','21000','23000','22000','31000','48000','10310','10436','52100',
			'grad'=>'Zagreb','Split','Zadar','Šibenik','Osijek','Koprivnica','Ivanić-Grad','Kalinovica','Pula',
			]);
	}
}
			