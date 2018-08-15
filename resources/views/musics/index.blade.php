@extends('layouts.main')


@section('header')
Songs
@stop


@section('content')
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
<script>
    $(document).ready(function() {
        $('table.songs').dataTable();
    });
</script>
@stop
