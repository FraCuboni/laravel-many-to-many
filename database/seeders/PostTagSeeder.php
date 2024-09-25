<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 25; $i++) {

            // prendo un post random
            $post = Post::inRandomOrder()->first();

            // prendo un ID di un TAG random
            $tag_id = Tag::inRandomOrder()->first()->id;

            // aggiungo la relazione tra il post estratto e il tag_id estratto
            $post->tags()->attach($tag_id);
        }
    }
}
