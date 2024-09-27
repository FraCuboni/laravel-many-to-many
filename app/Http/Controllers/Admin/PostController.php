<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

use App\Functions\Helper;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $types = Type::all();
        return view('admin.posts.index', compact('posts', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::all();
        $types = Type::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post', 'types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDAZIONE DA AGGIUNGERE
        $data = $request->all();
        Log::debug("data", $data);
        // creo dato da aggiungere nel db
        $post = new Post();
        $data['slug'] = Helper::generateSlug($data['title'], Post::class);

        $post->fill($data);

        $post->save();

        if (array_key_exists('tags', $data)) {
            $post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = type::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'types', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $post = Post::find($id);

        $post->update($data);


        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', 'post ' . '"' . $post->title . '"' . ' deleted');
    }
}
