<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\News;
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
        User::factory()->create([
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
            'type'     => 'admin',
        ]);

//        foreach (UserType::cases() as $type) {
//            if ($type->value !== 'admin') {
//
//                match ($type->value) {
//                    'company' => User::factory(30)->create([
//                        'type' => $type->value,
//                    ]),
//                    'student' => User::factory(1000)->create([
//                        'type' => $type->value,
//                    ]),
//                    default => null
//                };
//            }
//        }

        Student::factory(1000)->create();

        Company::factory(30)->create();

        Vacancy::factory(500)->create();

        News::factory(100)->create();

    }
}
