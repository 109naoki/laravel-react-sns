<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

         DB::table('users')->insert([
            [
            'name' => 'naoki',
            'email' => 'naoki.109.0525@gmail.com',
            'password' => Hash::make('052589Nao'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'tom',
            'email' => 'tom@gmail.com',
            'password' => Hash::make('052589Nao'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
