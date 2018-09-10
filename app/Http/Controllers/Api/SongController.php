<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MusicRequest;
use App\Music;

class SongController extends Controller
{
    public function index()
    {
        $songs = Music::all();
        return $songs;
    }

    public function show(Music $music)
    {
        return $music;
    }

    public function store(MusicRequest $req)
    {
        $song = Music::create($req->validated());
        return $song;
    }

    public function update(MusicRequest $req, Music $song)
    {
        $song->order = $req->order;
        $song->name = $req->name;
        $song->composer = $req->composer;
        $song->duration = $req->duration;
        $song->save();
        return $song;
    }

    public function destroy(Music $song)
    {
        $song->delete();
    }
}
