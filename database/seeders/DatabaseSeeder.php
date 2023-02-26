<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'admin123',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        DB::table('movie')->insert([
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
            'actor' => 'required|max:255',
            'trailer' => 'required|max:255',
            'synopsis' => 'required',
        ]);
    }
}