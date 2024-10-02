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
        $uuid = Str::uuid();
        $user = DB::table('users')->insert([
            'uuid' => $uuid,
            'name' => 'Yoga Bayu Anggana Pratama',
            'email' => 'yogabayusbi@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('profile')->insert([
            'user_uuid' => $uuid,
            'name' => 'Yoga Bayu Anggana Pratama',
            'desc' => 'lorem ipsum dolor sit amet',
            'telp' => '08213922',
            'photo1' => '08213922',
            'photo2' => '08213922',
            'website' => 'https://google.com',
            'twitter' => 'https://google.com',
            'facebook' => 'https://google.com',
            'instagram' => 'https://google.com',
            'linkedin' => 'https://google.com',
            'freelance' => 1,
            'address' => 'lorem ipsum',
            'tag' => 'Freelancer, Teknisi, Designer, Developer',
        ]);

        DB::table('settings')->insert(
            [
                'name_app' => 'portofolioKU',
                'logo' => 'portofolioKU.jpg',
            ]
        );
    }
}
