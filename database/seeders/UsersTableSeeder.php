<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Teguh Priyadi',
                'email' => 'teguh@arxino.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$mWBZkf44QR8DeJkCCqA0vuAmb4Up85FEUSE.cOfJ2TwMtrkSHTJIm',
                'remember_token' => NULL,
                'created_at' => '2026-07-20 05:24:55',
                'updated_at' => '2026-07-20 05:24:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Irshandy Hardadi',
                'email' => 'irshandy.hardadi@sdn.id',
                'email_verified_at' => NULL,
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'remember_token' => NULL,
                'created_at' => '2026-07-20 05:30:20',
                'updated_at' => '2026-07-20 05:30:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'William',
                'email' => 'william@arxino.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$YzTolkCEzINsLJ9hXV4LK.hpkl3dJE/pa1YRVuoIOnVgpHTwu12sW',
                'remember_token' => NULL,
                'created_at' => '2026-07-21 09:03:25',
                'updated_at' => '2026-07-21 09:03:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Irshandy',
                'email' => 'irshandy@arxino.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$lJzABqdjh72Xn7WUl6/RtOolV/22GciHVKMRb4JiQs0chUue.uNDa',
                'remember_token' => NULL,
                'created_at' => '2026-07-21 09:03:25',
                'updated_at' => '2026-07-21 09:03:25',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Rifki',
                'email' => 'rifki@arxino.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$2v1cQQn6xjpquwrBPpkKeuUTN6WJMLdbzwBxEleKj1L3QHvOJRpiu',
                'remember_token' => NULL,
                'created_at' => '2026-07-21 09:03:25',
                'updated_at' => '2026-07-21 09:03:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Client 1',
                'email' => 'client1@arxino.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$7.QMlUumvL23g5Ae.AARk.0gbw1T2.mvYIJ/sJ.ea2tQyd91an346',
                'remember_token' => NULL,
                'created_at' => '2026-07-21 09:03:26',
                'updated_at' => '2026-07-21 09:03:26',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Yoseph',
                'email' => 'yoseph@arxino.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$mn3.NJQ69dpx/Acu82Sui.LtORN075q7CnQWLznNmMXlzBEyvTpT2',
                'remember_token' => NULL,
                'created_at' => '2026-07-21 11:49:17',
                'updated_at' => '2026-07-21 11:49:17',
            ),
        ));
        
        
    }
}