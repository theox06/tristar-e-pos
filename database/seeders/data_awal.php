<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class data_awal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new user();
        $user->name = "Admin";
        $user->email = "admin@hotmail.com";
        $user->password = bcrypt('123456');
        $user->peran = "admin";
        $user->save();
    }
}
