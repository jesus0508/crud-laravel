<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Para evitar el problema con los registros unicos hago un truncate antes
        //DB::table('jobs')->truncate();

        //
        DB::table('jobs')->insert([
            'title'=>'Back-End',
            'max_salary'=>8000,
            'min_salary'=>1500
        ]);

        App\Job::create([
            'title'=>'Front-End',
            'max_salary'=>8000,
            'min_salary'=>1500
        ]);
    }
}
