<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

// importo helper per lo slug
use App\Functions\Helper;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Front End', 'Back End', 'Design', 'UX', 'Laravel', 'VueJs', 'Angular', 'React'];

        foreach ($data as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag;
            // genero slug con l'helper
            $new_tag->slug = Helper::generateSlug($new_tag->name, Tag::class);
            $new_tag->save();
        }
    }
}
