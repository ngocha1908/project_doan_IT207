<?php

namespace Database\Factories;

use App\Slug\Slug;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence;
        static $id = 1;

        return [
            'id' => $id++,
            'name' => $name,
            'slug' => Slug::getslug($name),
            'parent' => 0,
            'created_at' => Carbon::now()->toDateString(),
            'updated_at' => Carbon::now()->toDateString(),
        ];
    }
}
