<?php

namespace Database\Factories;

use App\Models\Product;
use App\Slug\Slug;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Product::class;
    
    public function definition()
    {
        $name = $this->faker->name;
        static $id = 1;

        return [
            'id' => $id++,
            'name' => $name,
            'code' => rand(0,1000),
            'slug' => Slug::getslug($name),
            'description' => $this->faker->paragraph,
            'price' => 100000,
            'is_featured' => rand(0,1),
            'status' => rand(0,1),
            'category_id' => rand(1,6),
            'created_at' => Carbon::now()->toDateString(),
            'updated_at' => Carbon::now()->toDateString(),
        ];
    }
}
