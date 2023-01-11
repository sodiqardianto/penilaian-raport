<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            MuridSeeder::class,
            GuruSeeder::class,
            PelajaranSeeder::class,
            SemesterSeeder::class,
            KategoriSeeder::class,
            KelasSeeder::class,
            WalikelasSeeder::class,
            GurupelajaranSeeder::class,
            KelasmuridSeeder::class,
            KelaspelajaranSeeder::class,
        ]);
    }
}
