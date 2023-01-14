<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            'namaguru' => 'Andi',
            'notelp' => '089582394219',
            'iduser' => '3'
        ]);

        Guru::create([
            'namaguru' => 'Ardi',
            'notelp' => '089672838481',
            'iduser' => '4'
        ]);
    }
}
