<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EpicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('epics')->delete();
        
        \DB::table('epics')->insert(array ());
        
        
    }
}