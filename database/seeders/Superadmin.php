<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class Superadmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if already seeded
        if (Admin::where('email', 'super@admin.com')->exists()) {
            $this->command->warn('Super Admin already exists!. Skipping this seeding....');
            return;
        }

        $password = bcrypt("123456");

        Admin::create([
            "name" => "admin",
            "email" => "super@admin.com",
            "password" => $password,
            "admin_type" => "super",
        ]);
    }
}
