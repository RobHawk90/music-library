@extends('layouts.main')


@section('header')
{{ $artist->name }}
@stop


@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <img class="card-img-top" src="{{ $artist->image }}" alt="Photo of {{ $artist->name }}">
            <div class="card-body">
                <p>
                    <strong>Genre: </strong>
                    {{ $artist->genre }}
                </p>
                <p>
                    <strong>Albums: </strong>
                    {{ count($artist->albums) }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <h5>Description</h5>
        <p>{{ $artist->description }}</p>
    </div>
</div>

<hr>

<h4>Albums</h4>

<div class="row">
    @foreach($artist->albums as $album)
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card text-center">
            <a href="/albums/{{ $album->id }}" class="list-group-item-action">
                <img class="card-img-top" src="{{ $album->image }}" alt="Photo of {{ $album->name }}">
                <div class="card-body">
                    <h5>{{ $album->name }}</h5>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
@stop
