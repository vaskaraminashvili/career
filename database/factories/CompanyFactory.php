<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id'     => User::factory()->create([
                'type' => UserType::COMPANY,
            ]),
            'title'       => $this->generateTranslatableField(['ka', 'en'], rand(2, 20)),
            'phone'       => $this->faker->phoneNumber,
            'address'     => $this->generateTranslatableField(['ka', 'en'], rand(2, 4)),
            'description' => $this->generateTranslatableField(['ka', 'en'], rand(2, 100)),
            'status'      => fake()->boolean(),
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
