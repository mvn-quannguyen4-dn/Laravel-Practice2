<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $posts = \App\Models\Post::all();
        $users = \App\Models\User::all();
        return [
            'content' => $this->faker->sentences(rand(5,20),true),
            'post_id' => $posts[rand(0,($posts->count()-1))]->id,
            'user_id' => $users[rand(0,($users->count()-1))]->id,
        ];
    }
}
