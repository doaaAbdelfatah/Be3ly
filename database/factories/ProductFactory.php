<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->company(),
            "price"=>$this->faker->numberBetween(100,5000),
            "description"=>$this->faker->paragraph(),
            "category_id"=>Category::inRandomOrder()->first()->id,
        ];
    }
}
