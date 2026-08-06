<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'DMS Distributor Management System',
                'key' => 'PRJ-ARX/2026/07/00001',
                'description' => NULL,
                'owner_id' => 1,
                'status' => 'Active',
                'workflow_config' => NULL,
                'custom_field_definitions' => NULL,
                'created_at' => '2026-07-09 08:20:13',
                'updated_at' => '2026-07-09 09:27:31',
                'start_date' => NULL,
                'end_date' => NULL,
            ),
        ));
        
        
    }
}