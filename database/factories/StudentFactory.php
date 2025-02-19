<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id'    => User::factory()->create([
                'type' => UserType::STUDENT,
            ]),
            'first_name' => $this->generateTranslatableField(['ka', 'en'], rand(5, 10)),
            'last_name'  => $this->generateTranslatableField(['ka', 'en'], rand(5, 15)),
            'phone'      => fake()->phoneNumber(),
            'status'     => fake()->boolean(),
        ];
    }


    protected function generateTranslatableField(
        array $locales,
              $number = 4
    ): array
    {
        $field = [];
        foreach ($locales as $locale) {
            $field[$locale]
                = fake()->sentence($number); // Generate fake data for each locale
        }
        return $field;
    }
}
