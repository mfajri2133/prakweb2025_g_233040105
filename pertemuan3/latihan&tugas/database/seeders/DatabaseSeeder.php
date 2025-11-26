<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User $i",
                'username' => "user$i",
                'email' => "user$i@example.com",
                'password' => bcrypt('password'),
            ]);
        }

        Category::factory(5)->create();

        Post::factory(20)->recycle(User::all())->recycle(Category::all())->create();
    }
}
