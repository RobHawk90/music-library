@extends('layouts.main')


@section('header')
Album "{{ $album->name }}"
@stop


@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6 text-center text-center">
        <div class="card">
            <img class="card-img-top" src="{{ $album->image }}" alt="Photo of {{ $album->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $album->name }} ({{ $album->year }})</h5>
                <p class="card-text">{{ $album->artist->name }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Song List</h5>
                <table class="table table-hover songs">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Composer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($album->musics as $song)
                        <tr>
                            <td>{{ $song->order }}</td>
                            <td>{{ $song->name }}</td>
                            <td>{{ $song->duration }}</td>
                            <td>{{ $song->composer }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


@section('footer')
<script>
    $(document).ready(function() {
        $('table.songs').dataTable({paginate: false});
    });
</script>
@stop
