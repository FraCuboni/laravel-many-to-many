<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // mette post in relazione con la table update_posts_table
    public function type()  //nome della funzione al singolare perchè ogni post a un type (type=one to post=many)
    {
        return $this->belongsTo(Type::class);
    }
    // questo metodo viene visto come proprietà ($post->type) mi restituisce il type in relazione
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $fillable = [
        'title',
        'type_id',
        'subject',
        'start_date',
        'end_date',
        'number_of_posts',
        'collaborators'
    ];
}
