<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $array = [
            'lecture',
            'seminar',
            'group_discussion',
            'presentation',
            'research_work',
            'grand_round',
            'graded_responsibility',
            'elog_book'
        ];
        return [

            'type' => $this->faker->randomElement($array),
            'description' => $this->faker->sentence(),
            'user_id' => User::factory(),

        ];
    }
    public function usered(): static
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => '1',
            'attachment_path'=>'attachments/VBXBiUfn2KLLirdfoB9C4C0cS9nh9QwRJVwqcRwS.png'
        ]);
    }
}
