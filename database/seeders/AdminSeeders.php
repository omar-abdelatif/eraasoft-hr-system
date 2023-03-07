<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeders extends Seeder
{

    public function run()
    {
        DB::table("users")->insert([
            "name" => "Omar",
            "email" => "omar@omar.com",
            "password" => bcrypt("123456789"),
        ]);
    }
}
