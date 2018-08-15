@extends('layouts.main')


@section('header')
Users
@stop


@section('content')
<div class="list-group">
    @foreach($users as $user)
    <a href="/users/edit/{{ $user->id }}" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h4 class="mb-1">{{ $user->name }}</h4>
            <small>{{ $user->created_at->diffForHumans() }}</small>
        </div>
        <p class="mb-1"><strong>Access Level: </strong>{{ $user->access }}</p>
        <small><strong>Email: </strong>{{ $user->email }}</small>
    </a>
    @endforeach
</div>
@stop
