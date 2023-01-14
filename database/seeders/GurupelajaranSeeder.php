<?php

namespace Database\Seeders;

use App\Models\Gurupelajaran;
use Illuminate\Database\Seeder;

class GurupelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gurupelajaran::create(['idpelajaran' => 3, 'idguru' => 1]);
        Gurupelajaran::create(['idpelajaran' => 4, 'idguru' => 1]);
        Gurupelajaran::create(['idpelajaran' => 5, 'idguru' => 1]);
        Gurupelajaran::create(['idpelajaran' => 6, 'idguru' => 2]);
    }
}
