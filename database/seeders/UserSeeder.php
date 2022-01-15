<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rayssa Matias Breia',
            'email' => 'usuario1@gmail.com',
            'registryNumber' => '32362100014',
            'password' => Hash::make('senha'),
            'type' => 'comum'
        ]);
        
        DB::table('users')->insert([
            'name' => 'Paulo Palhares Morais',
            'email' => 'lojista@gmail.com',
            'registryNumber' => '27014053000118',
            'password' => Hash::make('senha'),
            'type' => 'lojista'
        ]);

        DB::table('users')->insert([
            'name' => 'Sebastião Mamouros Lagos',
            'email' => 'usuario2@gmail.com',
            'registryNumber' => '03745798066',
            'password' => Hash::make('senha'),
            'type' => 'comum'
        ]);
    }
}
