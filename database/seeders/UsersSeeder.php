<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => "admin",
            'position' => "Officer",
            'email' => "admin@gmail.com",
            'phone' => "05531777777",
            'country' => "yemen",
            'city' => "taiz",
            'is_admin' => 1,
            'is_active' => 1,
            'password' => Hash::make('12345678')
        ]);
    }
}
