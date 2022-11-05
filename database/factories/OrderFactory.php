<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 1;
        return [
            'id' => $id++,
            'user_id' => rand(1,15),
            'total_price' => rand(100000,500000),
            'address' => $this->faker->address(),
            'status' => rand(1,6),
            'phone' => $this->faker->phoneNumber(),
            'note' => $this->faker->word(),
        ];
    }
}
