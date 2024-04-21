<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => env("USER_DEFAULT_NAME"),
            'email' => env('USER_DEFAULT_EMAIL'),
            'password' => bcrypt(env('USER_DEFAULT_PASSWORD')),
            'rol' => env('ROLE_ADMIN')
        ]);
    }
}
