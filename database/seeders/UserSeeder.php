<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $admin = new \App\Models\User;
        $admin->name = "Administrator";
        $admin->email = "admin@mail.com";
        $admin->password = Hash::make("admin123");
        $admin->save();
    }
}
