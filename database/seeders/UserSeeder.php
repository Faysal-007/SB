<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\User;
use App\models\user_profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'faysal',
            'email'=>'faysal@gmail.com',
            'phone'=>'01717250004',
            'usertype'=>'2',
            'password'=>'12345678',
            'is_delete'=>'0',
        ]);
        User::factory()->count(10)->create();
        user_profile::create([
            'education'=>'HSC',
            'location'=>'mirpur',
            'skills'=>'none',
            'position'=>'jr',
            'bio'=>'test bio',
            'user_id'=>'1'
        ]);
    }
}
