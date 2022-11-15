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
        User::create([
            'name'      =>  'admin',
            'username'  =>  'admin',
            'email'     =>  'admin@petrasejahteraabadi.co.id',
            'status'    =>  1,
            'password'  =>  Hash::make('123456')
        ]);
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
