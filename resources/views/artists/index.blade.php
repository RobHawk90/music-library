@extends('layouts.main')


@section('header')
Artists
@stop


@section('content')
<div class="card-deck row">
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
@stop
