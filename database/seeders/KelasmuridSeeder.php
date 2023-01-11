<?php

namespace Database\Seeders;

use App\Models\Kelasmurid;
use Illuminate\Database\Seeder;

class KelasmuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelasmurid::create(['idkelas' => 1, 'idmurid' => 1]);
    }
}
