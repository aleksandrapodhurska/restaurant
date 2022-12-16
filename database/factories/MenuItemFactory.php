<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Image;
use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (MenuItem $menuItem) {
            //
        })->afterCreating(function (MenuItem $menuItem) {
            // append category
            $menuItem->categories()->attach($this->faker->randomDigitNot(0));
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $menu = Menu::inRandomOrder()->first();
        $image = Image::inRandomOrder()->first();
        return [
            'menu_id' => $menu->id,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(15),
            'image_id' => $image->id,
            'price' => $this->faker->randomFloat(2, 4, 35),
            'quantity' => $this->faker->numberBetween(150, 350),
            'unit_of_measure' => $this->faker->randomElement(['g', 'ml']),
            'show' => $this->faker->boolean()
        ];
    }
}
