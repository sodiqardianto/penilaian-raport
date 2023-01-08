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
            'namamatapelajaran' => 'Sikap Spiritual',
            'muatan' => 'sikap',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Sikap Sosial',
            'muatan' => 'sikap',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Pendidikan Agama dan Budi Pekerti',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Bahasa Indonesia',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Matematika',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Ilmu Pengetahuan Alam',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Ilmu Pengetahuan Sosial',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Seni Budaya dan Keterampilan',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Pendidikan Jasmani Olahraga dan Kesehatan',
            'muatan' => 'pelajaran',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Budi Pekerti',
            'muatan' => 'lokal',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Bahasa Inggris',
            'muatan' => 'lokal',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Bahasa Korea',
            'muatan' => 'lokal',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Maths',
            'muatan' => 'lokal',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Science',
            'muatan' => 'lokal',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Computer',
            'muatan' => 'lokal',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Pramuka',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'English Conversetion',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Vocal',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Piano',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Gitar',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Futsal',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Basket',
            'muatan' => 'ekstrakulikuler',
        ]);

        Pelajaran::create([
            'namamatapelajaran' => 'Taekwondo',
            'muatan' => 'ekstrakulikuler',
        ]);
    }
}
