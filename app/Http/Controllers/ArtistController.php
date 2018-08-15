<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Requests\ArtistRequest;

class ArtistController extends AuthController
{
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        $artist = new Artist;
        $artist->name = old('name');
        $artist->image = old('image');
        $artist->genre = old('genre');
        $artist->description = old('description');
        return view('artists.create', compact('artist'));
    }

    public function show($id)
    {
        $artist = Artist::find($id);
        return view('artists.show', compact('artist'));
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function store(ArtistRequest $req)
    {
        Artist::create($req->validated());
        return redirect('/artists');
    }

    public function update(ArtistRequest $req, Artist $artist)
    {
        $artist->name = $req->name;
        $artist->image = $req->image;
        $artist->genre = $req->genre;
        $artist->description = $req->description;
        $artist->save();
        return redirect('/artists');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
    }
}
