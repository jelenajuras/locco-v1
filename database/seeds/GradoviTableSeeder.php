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
        DB::table('gradovi')->insert([
            'pbr' => '10000',
            'grad' => 'Zagreb',
        ]);

    }
}
