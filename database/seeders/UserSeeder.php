<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'fullname' => 'Dev Putra',
            'username' => 'DevGaming',
            'email' => 'dev@yahoo.com',
            'password' => '1234567'
        ]);
    }
}
