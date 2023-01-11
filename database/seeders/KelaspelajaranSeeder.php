<?php

namespace Database\Seeders;

use App\Models\Kelaspelajaran;
use Illuminate\Database\Seeder;

class KelaspelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelaspelajaran::create(['idkelas' => 1, 'idgurupelajaran' => 1]);
        Kelaspelajaran::create(['idkelas' => 1, 'idgurupelajaran' => 2]);
        Kelaspelajaran::create(['idkelas' => 1, 'idgurupelajaran' => 3]);
    }
}
