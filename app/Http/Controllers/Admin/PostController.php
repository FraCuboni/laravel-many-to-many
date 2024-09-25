<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Facades\Log;

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
        $types = type::all();
        return view('admin.posts.create', compact('post', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Log::debug("data", $data);
        // creo dato da aggiungere nel db
        $post = new Post();

        $post->fill($data);
        // assegno valori al dato
        // $comic->title = $data['title'];
        // $comic->series = $data['series'];
        // $comic->description = $data['description'];
        // $comic->price = $data['price'];
        // $comic->img = $data['img'];

        // salvo
        $post->save();
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
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $post = Post::find($id);

        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
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
