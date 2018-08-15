@extends('layouts.main')


@section('header')
Edit Album "{{ $album->name }}"
<button class="btn btn-danger" id="remove">Remove</button>
@stop


@section('content')
<div class="row">
    <div class="col-lg-6">
        <form name="album" action="{{ action('AlbumController@update', $album) }}" method="POST">
            @method('PUT')
            @include('albums.form')
        </form>
    </div>
    <div class="col-lg-6">
        @include('musics.create')
    </div>
</div>
@stop


@section('footer')
<script src="/js/image.js"></script>
<script src="/js/songs.js"></script>
<script>
    $(document).ready(function() {
        ConfirmDialog.onConfirm(function() {
            $.ajax({
                method: 'DELETE',
                url: $('form[name=album]').attr('action')
            }).then(function() {
                location.href = '/albums';
            });
        })
        .setBody("Do you really want to remove this album?");

        $('#remove').click(function() {
            ConfirmDialog.show();
        });
    });
</script>
@stop
