<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $content ='';
        for($i=0;$i<rand(10,50);$i++){
            $content .= '<p>' . $this->faker->sentences(rand(5,20),true).'</p>';
        }
        return [
            'content' => $content,
        ];
    }
}
