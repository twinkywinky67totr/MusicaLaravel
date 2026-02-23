<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateRequest;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::paginate(15);
        //$albums = Album::all();
        return view('album.index', ['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request){
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('albums', 'public');
        }
        Album::create($data);
        return redirect()->route('albums.index')->with('success', 'Álbum creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
    $album = Album::findOrFail($id);

    return view('album.show', compact('album'));
}

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($id){
        $album = Album::findOrFail($id);
        return view('album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Album $album){
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('albums', 'public');
        }
        $album->update($data);
        return redirect()->route('albums.show', $album->id)
            ->with('success', 'Album actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album){
    $album->delete();

    return redirect()->route('album.index')
    ->with('success', 'Disco eliminado correctamente');
}
}
