<?php

namespace Database\Seeders;

use App\Models\Walikelas;
use Illuminate\Database\Seeder;

class WalikelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Walikelas::create([
            'idkelas' => 1,
            'idguru' => 1
        ]);
    }
}
