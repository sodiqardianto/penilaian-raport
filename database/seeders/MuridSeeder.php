<?php

namespace Database\Seeders;

use App\Models\Murid;
use Illuminate\Database\Seeder;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Murid::create([
            'namamurid' => 'Paijo',
            'notelp' => '089502394523',
            'jeniskelamin' => '1',
            'nis' => '2023.5.001',
            'nisn' => '0109023940',
        ]);
    }
}
