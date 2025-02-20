<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title'       => $this->generateTranslatableField(['ka', 'en'], rand(1, 2)),
            'description' => $this->generateTranslatableField(['ka', 'en'], rand(5, 10)),
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
