<?php

namespace Database\Seeders;

use App\Models\Pelajaran;
use Illuminate\Database\Seeder;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelajaran::create([
            'namamatapelajaran' => 'Matematika',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Bahasa Indonesia',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Bahasa Inggris',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'IPA',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'IPS',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Pendidikan Agama',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Pendidikan Jasmani',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Seni Budaya',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'TIK',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'PKN',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Bimbingan Konseling',
        ]);
    }
}
