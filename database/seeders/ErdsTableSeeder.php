<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ErdsTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {


    \DB::table('erds')->delete();

    \DB::table('erds')->insert(array ());


  }
}