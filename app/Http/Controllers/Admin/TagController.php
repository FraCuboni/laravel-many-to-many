<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = tag::all();

        return view('admin.tags.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = tag::all();
        return view('admin.tags.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Log::debug("data", $data);
        // creo dato da aggiungere nel db
        $tag = new tag();

        $tag->fill($data);
        // assegno valori al dato
        // $comic->title = $data['title'];
        // $comic->series = $data['series'];
        // $comic->description = $data['description'];
        // $comic->price = $data['price'];
        // $comic->img = $data['img'];

        // salvo
        $tag->save();
        return redirect()->route('admin.tags.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = tag::find($id);
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $tag = tag::find($id);

        $tag->update($data);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('deleted', 'tag ' . '"' . $tag->title . '"' . ' deleted');
    }
}
