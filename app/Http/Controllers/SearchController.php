<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Music;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $this->validate(request(), ['search' => 'required|string|min:2|max:20']);

        $search = request('search');
        $artists = Artist::where('name', 'like', "%$search%")->get();
        $albums = Album::where('name', 'like', "%$search%")->get();
        $songs = Music::where('name', 'like', "%$search%")->get();

        return [
            'search' => $search,
            'artists' => $artists,
            'albums' => $albums,
            'songs' => $songs,
        ];
    }
}
