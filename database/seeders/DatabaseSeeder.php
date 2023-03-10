<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'phone'=>'089633439786',
            'address'=>'Jl.Anggrek no.57',
            'role'=>'admin'
        ]);

        DB::table('users')->insert([
            'username'=>'testuser',
            'email'=>'testuser@gmail.com',
            'password'=>Hash::make('testuser123'),
            'phone'=>'089633439786',
            'address'=>'Jl.Anggrek no.23',
            'role'=>'user'
        ]);
    }
}
