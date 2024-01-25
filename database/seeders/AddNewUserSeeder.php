<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddNewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        'name' => 'Yoba Wahid Orepa',
        'email' => 'yobawahid@yahoo.com',
        'password' => Hash::make('iniyoba'),
        
    ]);
    }
}
