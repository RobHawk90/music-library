@extends('layouts.main')


@section('header')
New Album
@stop


@section('content')
<form action="/albums" method="POST">
    @include('albums.form')
</form>
@stop


@section('footer')
<script src="/js/image.js"></script>
@stop
