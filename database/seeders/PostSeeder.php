<?php

namespace Database\Seeders;

use File;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = File::get(database_path('dummy_data.json'));
        $posts = json_decode($file);
        
        foreach ($posts as $post) {
            Post::create([
                'title' => $post->title,
                'body' => $post->body,
                'category' => $post->category,
                'views' => rand(0, 1000),
            ]);
        }

    }
}
