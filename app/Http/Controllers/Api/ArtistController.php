<?php

namespace App\Http\Controllers\Api;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index()
    {
        return Artist::all();
    }

    public function show(Artist $artist)
    {
        return $artist;
    }

    public function store(ArtistRequest $req)
    {
        $artist = $req->validated();
        $artist['image'] = $req->file('image')->store('images');
        $artist = Artist::create($artist);
        return $this->buildResponse($artist);
    }

    public function update(ArtistRequest $req, Artist $artist)
    {
        if ($req->hasFile('image') && $req->file('image')->isValid()) {
            Storage::delete($artist->image);
            $artist->image = $req->file('image')->store('images');
        }
        $artist->name = $req->name;
        $artist->genre = $req->genre;
        $artist->description = $req->description;
        $artist->save();
        return $this->buildResponse($artist);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return ['msg' => sprintf(__("The artist '%s' was removed"), $artist->name)];
    }

    private function buildResponse($artist)
    {
        return [
            'msg' => sprintf(__("The artist '%s' was saved"), $artist->name),
            'data' => $artist,
        ];
    }
}
