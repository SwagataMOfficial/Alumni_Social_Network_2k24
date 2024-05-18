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
        $faker = Faker::create("en_IN");

        $years = array('2020', '2021', '2022', '2023', '2024');
        $degrees = array('BCA', 'BBA', 'MCA');
        $genders = array('M', 'F', 'O');

        $y = count($years);
        $d = count($degrees);
        $g = count($genders);

        for ($i = 1; $i <= 100; $i++) {
            User::create([
                'student_id' => $i,
                'name' => $faker->name,
                'email' => 'alumni20x' . $i . '@gmail.com',
                'phone' => $faker->numberBetween(1000000000, 9999999999),
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gender' => $genders[$i % $g],
                'address' => $faker->address,
                'password' => bcrypt('123456'),
                'graduation_year' => $years[$i % $y],
                'degree' => $degrees[$i % $d],
                'profile_picture' => "default/avatar.jpg",
                'cover_picture' => 'default/cover.png',
                'about' => "Student at Techno India Hooghly",
                'languages' => "Bengali, English, Hindi",
                'skills' => "Communication skills, writing skills, coding skills, public speaking skills",
                'expertise' => "C, Java, Python, PHP, Javascript",
                'education' => "Harvard University",
                'career_history' => "4 month internship at TCS, spent 2 years at Deloitte, Now working at Microsoft",
                'projects' => "Minor project, Major project",
                'publications' => "Publication1, Publication2, Publication3, Publication4",
                'hostel' => "My hostel",
                'first_company' => $faker->company,
                'current_company' => $faker->company,
                'facebook_link' => $faker->url,
                'instagram_link' => $faker->url,
                'twitter_link' => $faker->url,
                'github_link' => $faker->url,
                'linkedin_link' => $faker->url,
                'nickname' => $faker->firstName,
                'verification_document' => 'default/v_doc.jpg',
                'remember_token' => md5($i . 'alumni20x' . $i . '@gmail.com'),
                'verified_at' => now()
            ]);
        }
    }
}