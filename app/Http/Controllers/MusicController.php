<?php

namespace App\Http\Controllers;

use App\Music;
use App\Http\Requests\MusicRequest;

class MusicController extends AuthController
{
    public function index()
    {
        $songs = Music::all();
        return view('musics.index', compact('songs'));
    }

    public function show(Music $music)
    {
        return $music;
    }

    public function store(MusicRequest $req)
    {
        $music = Music::find($req->id);
        if (empty($music)) {
            return Music::create($req->validated());
        }
        $music->name = $req->name;
        $music->order = $req->order;
        $music->composer = $req->composer;
        $music->duration = $req->duration;
        $music->save();
        return $music;
    }

    public function destroy(Music $music)
    {
        $music->delete();
    }
}
