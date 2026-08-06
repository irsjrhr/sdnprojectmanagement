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
        
        \DB::table('sprints')->insert(array (
            0 => 
            array (
                'id' => 15,
                'project_id' => 1,
                'name' => '01 Initial Discussion to Identify goals and objectives',
                'start_date' => '2026-07-19 14:00:00',
                'end_date' => '2026-07-19 16:00:00',
                'goal' => NULL,
                'status' => 'Active',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            1 => 
            array (
                'id' => 16,
                'project_id' => 1,
                'name' => '02 Document Scope Management Plan [Final Requirement]',
                'start_date' => '2026-07-16 09:31:42',
                'end_date' => '2026-07-23 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            2 => 
            array (
                'id' => 17,
                'project_id' => 1,
            'name' => '03 Feedback & alignment (internal , stakeholder, vendor)',
                'start_date' => '2026-07-23 09:31:42',
                'end_date' => '2026-07-30 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            3 => 
            array (
                'id' => 18,
                'project_id' => 1,
                'name' => '04 Persetujuan Scope & mandays CR',
                'start_date' => '2026-07-30 09:31:42',
                'end_date' => '2026-08-06 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            4 => 
            array (
                'id' => 19,
                'project_id' => 1,
                'name' => '05 Development fitur',
                'start_date' => '2026-08-06 09:31:42',
                'end_date' => '2026-08-13 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            5 => 
            array (
                'id' => 20,
                'project_id' => 1,
                'name' => '07 UAT',
                'start_date' => '2026-08-20 09:31:42',
                'end_date' => '2026-08-27 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            6 => 
            array (
                'id' => 21,
                'project_id' => 1,
                'name' => '08 Specify deliverables and acceptance criteria',
                'start_date' => '2026-08-27 09:31:42',
                'end_date' => '2026-09-03 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            7 => 
            array (
                'id' => 22,
                'project_id' => 1,
                'name' => '09 Deployment',
                'start_date' => '2026-09-03 09:31:42',
                'end_date' => '2026-09-10 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            8 => 
            array (
                'id' => 23,
                'project_id' => 1,
                'name' => '06 SIT',
                'start_date' => '2026-08-13 09:31:42',
                'end_date' => '2026-08-20 09:31:42',
                'goal' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
        ));
        
        
    }
}