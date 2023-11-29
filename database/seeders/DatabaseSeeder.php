<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'uuid' => Str::uuid(),
                'name' => 'Yoga Bayu Anggana Pratama',
                'email' => 'yogabayusbi@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );
        
        DB::table('settings')->insert(
            [
                'name_app' => 'portofolioKU',
                'logo' => 'portofolioKU.jpg',
            ]
        );
    }
}
