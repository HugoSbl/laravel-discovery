<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;
use App\Models\Blog;
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
    public function definition(): array
    {
        return [
            'message' => $this->faker->paragraph(),
            'user_id' => User::where('role_id', Role::where('name', 'reader')->first()->id)->inRandomOrder()->first()->id, // Associer un `reader` existant
            'blog_id' => Blog::inRandomOrder()->first()->id, // Associer un blog existant
        ];
    }
}
