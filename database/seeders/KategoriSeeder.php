<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'namakategorinilai' => 'Sikap',
        ]);

        Kategori::create([
            'namakategorinilai' => 'Pengetahuan',
        ]);

        // Kategori::create([
        //     'namakategorinilai' => 'Pengetahuan Muatan Lokal',
        // ]);

        Kategori::create([
            'namakategorinilai' => 'Keterampilan',
        ]);

        // Kategori::create([
        //     'namakategorinilai' => 'Keterampilan Muatan Lokal',
        // ]);

        Kategori::create([
            'namakategorinilai' => 'Ekstrakulikuler',
        ]);

        Kategori::create([
            'namakategorinilai' => 'Catatan',
        ]);
    }
}
