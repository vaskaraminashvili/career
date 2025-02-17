<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title'       => $this->generateTranslatableField(['ka', 'en'], rand(5, 20)),
            'description' => $this->generateTranslatableField(['ka', 'en'], rand(5, 150)),
            'start_date'  => $this->faker->dateTimeBetween('-1 month'),
            'end_date'    => $this->faker->dateTimeBetween('now', '+2 months'),
            'company_id'  => rand(1, 30),
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
