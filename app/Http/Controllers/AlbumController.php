<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Http\Requests\AlbumRequest;

class AlbumController extends AuthController
{
    public function index()
    {
        $albums = Album::all();

        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        $album = new Album;
        $album->name = old('name');
        $album->artist_id = old('artist_id');
        $album->image = old('image');
        $album->year = old('year');

        $artists = Artist::all();

        return view('albums.create', compact(['album', 'artists']));
    }

    public function store(AlbumRequest $req)
    {
        $album = Album::create($req->validated());

        return redirect()->action('AlbumController@edit', compact('album'));
    }

    public function show($id)
    {
        $album = Album::find($id);
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $artists = Artist::all();
        return view('albums.edit', compact(['album', 'artists']));
    }

    public function update(AlbumRequest $req, Album $album)
    {
        $album->name = $req->name;
        $album->year = $req->year;
        $album->image = $req->image;
        $album->artist_id = $req->artist_id;
        $album->save();
        return redirect('/albums');
    }

    public function destroy(Album $album)
    {
        $album->delete();
    }
}
