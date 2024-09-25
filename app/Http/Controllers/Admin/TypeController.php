<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Log;

class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = type::all();

        return view('admin.types.index', [
            'types' => $types,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = type::all();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Log::debug("data", $data);
        // creo dato da aggiungere nel db
        $type = new type();

        $type->fill($data);
        // assegno valori al dato
        // $comic->title = $data['title'];
        // $comic->series = $data['series'];
        // $comic->description = $data['description'];
        // $comic->price = $data['price'];
        // $comic->img = $data['img'];

        // salvo
        $type->save();
        return redirect()->route('admin.types.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = type::find($id);
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = type::find($id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $type = type::find($id);

        $type->update($data);

        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('deleted', 'type ' . '"' . $type->title . '"' . ' deleted');
    }
}
