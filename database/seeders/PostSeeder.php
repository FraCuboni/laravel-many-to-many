<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

// importo helper per lo slug
use App\Functions\Helper;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Post();

            // $train->azienda = $faker->company();

            $post->title = $faker->jobTitle();
            // genero slug con l'helper
            $post->slug = Helper::generateSlug($post->title, Post::class);
            $post->type_id = Type::inRandomOrder()->first()->id; //estraggo elemento random dalla table type, prendo il primo elemento e il suo ID
            $post->subject = $faker->sentence();
            $post->start_date = $faker->date();
            $post->end_date = $faker->date();
            $post->number_of_posts = $faker->numberBetween(1, 255);
            $post->collaborators = $faker->jobTitle();

            $post->save();

            // $table->string('title');
            // $table->text('subject');
            // $table->date('start_date');
            // $table->date('end_date');
            // $table->tinyInteger('number_of_posts')->unsigned();
            // $table->string('collaborators');

        }
    }
}
