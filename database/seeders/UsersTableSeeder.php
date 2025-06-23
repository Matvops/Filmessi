<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 0; $i < 3; $i++) {
            DB::table('users')->insert(
                [
                    'username' => "user$i",
                    'email' => "user$i@gmail.com",
                    'password' => bcrypt("Senha123"),
                    'role' =>  "ADMIN",
                    'email_verified_at' => Carbon::now(),
                    'active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
