@extends('layouts.main')


@section('header')
New User
@stop


@section('content')
<form action="/users" method="POST">
    @include('users.form')
</form>
@stop
