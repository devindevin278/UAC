<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Avatar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Devin',
            'email' => 'devin@gmail.com',
            'password' => bcrypt('12345'),
            'gender' => 'male',
            'linkedin' => 'devin',
            'phone' => '0812345678',
            'photo' => 'profile-pic/devin.jpg'
        ]);
        User::create([
            'name' => 'Abdi',
            'email' => 'Abdi@gmail.com',
            'password' => bcrypt('12345'),
            'gender' => 'male',
            'linkedin' => 'abdi',
            'phone' => '0812345678',
            'photo' => 'profile-pic/1.jpg'
        ]);

        User::create([
            'name' => 'Ardo',
            'email' => 'Ardo@gmail.com',
            'password' => bcrypt('12345'),
            'gender' => 'male',
            'linkedin' => 'ardo',
            'phone' => '0812345678',
            'photo' => 'profile-pic/2.jpg'
        ]);

        User::create([
            'name' => 'Alicia',
            'email' => 'Alicia@gmail.com',
            'password' => bcrypt('12345'),
            'gender' => 'female',
            'linkedin' => 'Alicia',
            'phone' => '0812345678',
            'photo' => 'profile-pic/3.jpg'
        ]);
        User::create([
            'name' => 'Amanda',
            'email' => 'amanda@gmail.com',
            'password' => bcrypt('12345'),
            'gender' => 'female',
            'linkedin' => 'amanda',
            'phone' => '0812345678',
            'photo' => 'profile-pic/4.jpg'
        ]);

        Avatar::create([
            'name' => 'Avatar1',
            'image' => 'avatar/1.jpg',
            'price' => 100000
        ]);
        Avatar::create([
            'name' => 'Avatar2',
            'image' => 'avatar/2.jpg',
            'price' => 150000
        ]);
        Avatar::create([
            'name' => 'Avatar3',
            'image' => 'avatar/3.jpg',
            'price' => 125000
        ]);
        Avatar::create([
            'name' => 'Avatar4',
            'image' => 'avatar/4.jpg',
            'price' => 130000
        ]);
        Avatar::create([
            'name' => 'Avatar5',
            'image' => 'avatar/5.jpg',
            'price' => 110000
        ]);
    }
}
