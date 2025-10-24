<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        foreach ($users as $user) {
            for ($i = 1; $i <= 3; $i++) {
                $post = Post::create([
                    'user_id' => $user->id,
                    'category_id' => $categories->random()->id,
                    'title' => "Post $i by $user->name",
                    'content' => "Content of post $i by $user->name",
                ]);

                // Attach 2 random tags
                $post->tags()->attach($tags->random(2));
            }
        }
    }
}
