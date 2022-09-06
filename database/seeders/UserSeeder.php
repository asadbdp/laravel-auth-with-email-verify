<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'User']);

        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmil.com',
            'password' => Hash::make(12345678),

        ]);

        User::create([
            'role_id' => 2,
            'name' => 'User',
            'email' => 'user@gmil.com',
            'password'=>Hash::make(12345678),

        ]);
    }
}
