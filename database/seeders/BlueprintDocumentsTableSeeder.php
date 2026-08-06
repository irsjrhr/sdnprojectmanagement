<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlueprintDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blueprint_documents')->delete();
        
        \DB::table('blueprint_documents')->insert(array ());
        
        
    }
}