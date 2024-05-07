<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $faker = Faker::create();

        User::create([
            'student_id' => '2115230110',
            'name' => 'Swagata Mukherjee',
            'email' => 'attendancesystem24x66@gmail.com',
            'password' => bcrypt('attendance'),
            'graduation_year' => '2024',
            'degree' => 'BCA',
            'profile_picture' => "default/avatar.jpg",
            'cover_picture' => 'default/cover.png',
            'verification_document' => 'v_doc.img',
            'remember_token' => md5('2115230110' . 'attendancesystem24x66@gmail.com')
        ]);

        for ($i = 1; $i <= 19; $i++) {
            $id = '152' . $faker->numberBetween(100, 999);
            User::create([
                'student_id' => $id,
                'name' => $faker->name,
                'email' => 'attendancesystem24x' . $i . '@gmail.com',
                'password' => bcrypt('attendance'),
                'graduation_year' => '2024',
                'degree' => 'BCA',
                'profile_picture' => "default/avatar.jpg",
                'cover_picture' => 'default/cover.png',
                'verification_document' => 'v_doc.img',
                'remember_token' => md5($id . 'attendancesystem24x'. $i .'@gmail.com')
            ]);
        }

    }
}
