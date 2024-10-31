<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
        ]);

        User::factory()->count(2)->admin()->create();
        User::factory()->count(20)->reader()->create();
        User::factory()->count(5)->author()->create();

        Blog::factory()->count(50)->create();
        Comment::factory()->count(1000)->create();
    }
}
