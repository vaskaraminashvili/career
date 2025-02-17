<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;

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
            'title'       => $this->generateTranslatableField(['ka', 'en'], rand(2,20)),
            'director'    => $this->generateTranslatableField(['ka', 'en'], rand(2,10)),
            'address'     => $this->generateTranslatableField(['ka', 'en'], rand(2,4)),
            'description' => $this->generateTranslatableField(['ka', 'en'], rand(2,100)),
            'email'       => fake()->safeEmail(),
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
