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
            'namakategorinilai' => 'Sikap Spiritual',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Sikap Sosial',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Catatan',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Pengetahuan Muatan Pelajaran',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Pengetahuan Muatan Lokal',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Keterampilan Muatan Pelajaran',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Keterampilan Muatan Lokal',
        ]);
        Kategori::create([
            'namakategorinilai' => 'Ekstrakulikuler',
        ]);
    }
}
