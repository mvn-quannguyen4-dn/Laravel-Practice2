<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create()->each(function($user){
            \App\Models\Profile::factory(1)->create([
                'user_id' => $user->id
            ]);
            \App\Models\Post::factory(rand(5,20))->create([
                'user_id' => $user->id
            ]);
        });
        \App\Models\Comment::factory(2000)->create();
    }
}
