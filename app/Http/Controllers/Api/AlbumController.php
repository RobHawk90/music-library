<?php

namespace App\Http\Controllers\Api;

use App\Album;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('artist')->get();
        return $albums;
    }

    public function store(AlbumRequest $req)
    {
        $album = $req->validated();
        $album['image'] = $req->file('image')->store('images');
        $album = Album::create($album);
        return $this->buildResponse($album);
    }

    public function show(Album $album)
    {
        $album->musics;
        return $album;
    }

    public function update(AlbumRequest $req, Album $album)
    {
        if ($req->hasFile('image') && $req->file('image')->isValid()) {
            Storage::delete($album->image);
            $album->image = $req->file('image')->store('images');
        }

        $album->name = $req->name;
        $album->year = $req->year;
        $album->artist_id = $req->artist_id;
        $album->save();
        return $this->buildResponse($album);
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return ['msg' => sprintf(__("The album '%s' was removed"), $album->name)];
    }

    public function buildResponse($album)
    {
        return [
            'msg' => sprintf(__("The album '%s' was saved"), $album->name),
            'data' => $album,
        ];
    }
}
