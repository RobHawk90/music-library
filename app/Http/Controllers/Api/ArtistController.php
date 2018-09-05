<?php

namespace App\Http\Controllers\Api;

use App\Artist;
use App\Http\Controllers\AuthController;
use App\Http\Requests\ArtistRequest;

class ArtistController extends AuthController
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
        $artist = Artist::create($req->validated());
        return $this->buildResponse($artist);
    }

    public function update(ArtistRequest $req, Artist $artist)
    {
        $artist->name = $req->name;
        $artist->image = $req->image;
        $artist->genre = $req->genre;
        $artist->description = $req->description;
        $artist->save();
        return $this->buildResponse($artist);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
    }

    private function buildResponse($artist)
    {
        return [
            'msg' => sprintf(__("The artist '%s' was saved"), $artist->name),
            'data' => $artist,
        ];
    }
}
