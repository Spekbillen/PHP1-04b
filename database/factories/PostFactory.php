<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'subsection_id' => rand(1,10),
            'title' => $this->faker->sentence(nbWords: 5),
            'comment' => $this->faker->sentence(nbWords: 100),
            'up_votes' => rand(1,100),
            'down_votes' => rand(1,10)
        ];
    }
}
