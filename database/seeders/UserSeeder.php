<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'      =>  'admin',
            'username'  =>  'admin',
            'email'     =>  'admin@gmail.com',
            'status'    =>  1,
            'password'  =>  Hash::make('123456')
        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'name'      =>  'Tata Usaha',
            'username'  =>  'tatausaha',
            'email'     =>  'tatausaha@gmail.com',
            'status'    =>  1,
            'password'  =>  Hash::make('123456')
        ]);
        $admin->assignRole('tata usaha');

        $admin = User::create([
            'name'      =>  'Guru',
            'username'  =>  'guru1',
            'email'     =>  'guru1@gmail.com',
            'status'    =>  1,
            'password'  =>  Hash::make('123456')
        ]);
        $admin->assignRole('guru');
        // $admin = User::create([
        //     'name'      =>  'admin',
        //     'username'  =>  'admin',
        //     'email'     =>  'admin@gmail.com',
        //     'status'    =>  1,
        //     'password'  =>  Hash::make('123456')
        // ]);
        // $admin->assignRole('admin', 'user');
    }
}
