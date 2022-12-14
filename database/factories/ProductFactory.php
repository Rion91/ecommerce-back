<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->word()),
            'description' => $this->faker->paragraph,
            'unit_price' => $this->faker->randomFloat(2, 0, 10000),
            'image' => $this->faker->image('public/storage/images',400,300, null, false),
            'category_id' => self::factoryForModel(Category::class),
        ];
    }
}
