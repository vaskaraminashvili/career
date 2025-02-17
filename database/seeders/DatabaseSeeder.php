<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Student;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory(1000)->create();
        
        Company::factory(30)->create();

        Vacancy::factory(500)->create();
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
