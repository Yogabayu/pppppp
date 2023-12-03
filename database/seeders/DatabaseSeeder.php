<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
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
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );
        $user = DB::table('users')->first();
        DB::table('profile')->insert(
            [
                'user_uuid' =>  $user->uuid,
                'name' => 'Yoga Bayu Anggana Pratama',
                'desc' => '--',
                'telp' => '082139552647',
                'photo1' => '--',
                'photo2' => '--',
                'website' => '--',
                'twitter' => '--',
                'facebook' => '--',
                'instagram' => '--',
                'linkedin' => '--',
                'tagline' => 'Developer, Teknisi, Sleeper',
                'freelance' => 1,
            ]
        );
        DB::table('educations')->insert(
            [
                'user_uuid'=> $user->uuid,
                'sekolah'=>'--',
                'jurusan'=>'--',
                'start'=>Carbon::now(),
                'end'=>Carbon::now(),
                'desc'=>'--',
            ]
        );
        DB::table('experiences')->insert(
            [
                'user_uuid'=> $user->uuid,
                'position'=>'--',
                'office'=>'--',
                'start'=>Carbon::now(),
                'end'=>Carbon::now(),
                'desc'=>'-',
                'type'=>1,
            ]
        );
        DB::table('portofolios')->insert(
            [
                'user_uuid'=> $user->uuid,
                'photo'=>'--',
                'title'=>'--',
                'desc'=>'--',
                'tag'=>'--',
            ]
        );
        DB::table('skills')->insert(
            [
                'user_uuid'=> $user->uuid,
                'name'=>'--',
                'icon'=>'--',
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
