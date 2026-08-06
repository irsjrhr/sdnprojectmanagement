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
        
        \DB::table('epics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
                'name' => 'System Foundation & Configuration',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:34',
                'updated_at' => '2026-07-21 07:28:34',
            ),
            1 => 
            array (
                'id' => 2,
                'project_id' => 1,
                'name' => 'Master Data Management',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:35',
                'updated_at' => '2026-07-21 07:28:35',
            ),
            2 => 
            array (
                'id' => 3,
                'project_id' => 1,
                'name' => 'Procure to Pay - Bagian Pengadaan',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:35',
                'updated_at' => '2026-07-21 07:28:35',
            ),
            3 => 
            array (
                'id' => 4,
                'project_id' => 1,
                'name' => 'Inventory & Warehouse Management',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:35',
                'updated_at' => '2026-07-21 07:28:35',
            ),
            4 => 
            array (
                'id' => 5,
                'project_id' => 1,
                'name' => 'Order to Cash - Bagian Penjualan',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:35',
                'updated_at' => '2026-07-21 07:28:35',
            ),
            5 => 
            array (
                'id' => 6,
                'project_id' => 1,
                'name' => 'Logistics & Manufacturing',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:36',
                'updated_at' => '2026-07-21 07:28:36',
            ),
            6 => 
            array (
                'id' => 7,
                'project_id' => 1,
                'name' => 'Accounts Payable - Hutang Vendor',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:36',
                'updated_at' => '2026-07-21 07:28:36',
            ),
            7 => 
            array (
                'id' => 8,
                'project_id' => 1,
                'name' => 'Accounts Receivable - Piutang Customer',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:36',
                'updated_at' => '2026-07-21 07:28:36',
            ),
            8 => 
            array (
                'id' => 9,
                'project_id' => 1,
                'name' => 'General Ledger & Treasury',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:36',
                'updated_at' => '2026-07-21 07:28:36',
            ),
            9 => 
            array (
                'id' => 10,
                'project_id' => 1,
                'name' => 'Financial Reporting & Closing',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:36',
                'updated_at' => '2026-07-21 07:28:36',
            ),
            10 => 
            array (
                'id' => 11,
                'project_id' => 1,
                'name' => 'Enterprise Reporting & Analytics',
                'description' => NULL,
                'status' => 'Planned',
                'created_at' => '2026-07-21 07:28:36',
                'updated_at' => '2026-07-21 07:28:36',
            ),
        ));
        
        
    }
}