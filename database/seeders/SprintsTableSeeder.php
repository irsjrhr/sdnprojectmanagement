<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SprintsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sprints')->delete();
        
        \DB::table('sprints')->insert(array ());
        
        
    }
}