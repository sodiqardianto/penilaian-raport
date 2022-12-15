<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'semester'  => 1,
            'tahun'     => 2020,
        ]);

        Semester::create([
            'semester'  => 2,
            'tahun'     => 2020,
        ]);

        Semester::create([
            'semester'  => 1,
            'tahun'     => 2021,
        ]);

        Semester::create([
            'semester'  => 2,
            'tahun'     => 2021,
        ]);

        Semester::create([
            'semester'  => 1,
            'tahun'     => 2022,
        ]);

        Semester::create([
            'semester'  => 2,
            'tahun'     => 2022,
        ]);

        Semester::create([
            'semester'  => 1,
            'tahun'     => 2023,
        ]);

        Semester::create([
            'semester'  => 2,
            'tahun'     => 2023,
        ]);

        Semester::create([
            'semester'  => 1,
            'tahun'     => 2024,
        ]);

        Semester::create([
            'semester'  => 2,
            'tahun'     => 2024,
        ]);
    }
}
