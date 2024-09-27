<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo helper per lo slug
use App\Functions\Helper;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'CSS', 'PHP', 'JS', 'C++', 'C#'];
        foreach ($data as $type) {

            $new_type = new Type();

            $new_type->name = $type;
            // genero slug con l'helper
            $new_type->slug = Helper::generateSlug($new_type->name, Type::class);

            $new_type->save();
        }
    }
}
