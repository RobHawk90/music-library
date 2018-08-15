@extends('layouts.main')


@section('header')
Results of search by "{{ $search }}"
@stop


@section('content')
<h4>Artists</h4>
<div class="row">
    @foreach($artists as $artist)
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="card text-center">
            <img class="card-img-top" src="{{ $artist->image }}" alt="Photo of {{ $artist->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $artist->name }}</h5>
                <p class="card-text">{{ $artist->genre }}</p>
            </div>
            <div class="card-footer">
                <a href="/artists/edit/{{ $artist->id }}" class="btn btn-warning">Edit</a>
                <a href="/artists/{{ $artist->id }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<hr>

<h4>Albums</h4>
<div class="row">
    @foreach($albums as $album)
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="card text-center">
            <img class="card-img-top" src="{{ $album->image }}" alt="Photo of {{ $album->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $album->name }} ({{ $album->year }})</h5>
                <p class="card-text">{{ $album->artist->name }}</p>
            </div>
            <div class="card-footer">
                <a href="/albums/edit/{{ $album->id }}" class="btn btn-warning">Edit</a>
                <a href="/albums/{{ $album->id }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<hr>

<h4>Songs</h4>
<table class="table table-hover songs">
    <thead>
        <tr>
            <th>Name</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Composer</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($songs as $song)
        <tr>
            <td>{{ $song->name }}</td>
            <td>{{ $song->album->artist->name }}</td>
            <td>{{ $song->album->name }} ({{ $song->album->year }})</td>
            <td>{{ $song->composer }}</td>
            <td>{{ $song->duration }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop


@section('footer')

@stop
