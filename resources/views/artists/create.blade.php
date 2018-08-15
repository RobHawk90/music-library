@extends('layouts.main')


@section('header')
New Artist
@stop


@section('content')
<form action="/artists" method="POST">
    @include('artists.form')
</form>
@stop

@section('footer')
<script src="/js/image.js"></script>
@stop
