<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = Image::inRandomOrder()->first();
        return [
            'parent' => Null,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(15),
            'image_id' => $image->id,
            'is_exclusive' => $this->faker->boolean(),
            'show' => $this->faker->boolean()
        ];
    }
}
