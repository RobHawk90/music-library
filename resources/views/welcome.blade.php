@extends('layouts.main')


@section('header')
Welcome, {{ auth()->user()->name }}
@stop
