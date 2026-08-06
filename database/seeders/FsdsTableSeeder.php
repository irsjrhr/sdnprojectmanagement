<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FsdsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('fsds')->delete();
        \DB::table('fsds')->insert(array ());
    }
}
