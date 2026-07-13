<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::factory(10)->create();
        $tags = \App\Models\Tag::factory(10)->create();
        
        $user = \App\Models\User::first() ?? \App\Models\User::factory()->create();

        \App\Models\Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => fn () => $categories->random()->id,
            'status' => 'published',
            'published_at' => now(),
        ])->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
