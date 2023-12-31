<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'id'=>1,
                'name'=> "admin",
                'email'    => "admin@gmail.com",
                'role'  => "admin_utama",
                'password'    => bcrypt('12345678'),          
            ]
        ]);
    }
}
