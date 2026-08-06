<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('project_features')->delete();
        
        \DB::table('project_features')->insert(array ());
        
        
    }
}