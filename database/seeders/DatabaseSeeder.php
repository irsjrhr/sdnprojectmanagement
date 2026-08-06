<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->call(UsersTableSeeder::class);
        //this->call(RolesAndPermissionsSeeder::class); // <-- DIAKTIFKAN KEMBALI UNTUK UPDATE AKSES
        //$this->call(ProjectsTableSeeder::class);
        //$this->call(EpicsTableSeeder::class);
        //$this->call(SprintsTableSeeder::class);

        //$this->call(ProjectFeaturesTableSeeder::class); // <-- DIAKTIFKAN KEMBALI

        // HANYA SEEDER DOKUMENTASI YANG AKTIF AGAR DATA KANBAN/OPERASIONAL VPS TIDAK KETIMPA
        $this->call(BlueprintDocumentsTableSeeder::class);
        $this->call(BrdDocumentsTableSeeder::class);
        $this->call(ErdsTableSeeder::class);
        $this->call(FsdsTableSeeder::class);

        //$this->call(TasksTableSeeder::class);
    }
}