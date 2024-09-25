<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // con questo metodo richiamando $type->posts ottengo i post in relazione all type
    public function posts() //al plurale perchè one(type) to many(posts)
    {
        return $this->hasMany(Post::class);
        // nel caso di relazione one to one    return $this->hasOne(Post::class);

    }

    protected $fillable = [
        'name'
    ];
}
