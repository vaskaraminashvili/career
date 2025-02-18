<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Feedback;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => '{}',
            'description' => '{}',
            'status' => fake()->boolean(),
        ];
    }
}
