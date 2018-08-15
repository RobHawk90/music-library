@extends('layouts.main')


@section('header')
Albums
@stop


@section('content')
<div class="card-deck">
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
@stop


@section('footer')

@stop
