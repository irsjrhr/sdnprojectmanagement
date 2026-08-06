<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrdDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brd_documents')->delete();
        
        \DB::table('brd_documents')->insert(array ());
        
        
    }
}