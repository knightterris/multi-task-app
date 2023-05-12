<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email'=> 'admin@gmail.com',
            'phone'=> '959888777666',
            'address'=> 'USA',
            'gender'=> 'male',
            'role'=> 'admin',
            'password'=> Hash::make('admin123'),
        ]);
    }
}
