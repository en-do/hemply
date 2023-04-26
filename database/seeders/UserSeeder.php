<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'role_id' => 1,
            'username' => 'admin',
            'first_name' => 'Andy',
            'email' => 'denys@shevchyk.dev',
            'password' => Hash::make('1q2w3e4r'),
            'hide_profile' => true
        ]);
    }
}
