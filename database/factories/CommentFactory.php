<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Comment::class;
    
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'product_id' => rand(1,20),
            'content' => $this->faker->word(),
        ];
    }
}
