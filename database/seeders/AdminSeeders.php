<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeders extends Seeder
{

    public function run()
    {
        User::create([
            "name" => "Omar",
            "email" => "omar@omar.com",
            "password" => bcrypt("123456789"),
        ]);
    }
}
