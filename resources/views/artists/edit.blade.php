@extends('layouts.main')


@section('header')
Edit Artist "{{ $artist->name }}"
<button class="btn btn-danger" id="remove">Remove</button>
@stop


@section('content')
<form action="{{ action('ArtistController@update', $artist) }}" method="POST">
    @method('PUT')
    @include('artists.form')
</form>
@stop


@section('footer')
<script src="/js/image.js"></script>
<script>
    $(document).ready(function() {
        ConfirmDialog.onConfirm(function() {
            $.ajax({
                method: 'DELETE',
                url: $('form').attr('action')
            }).then(function() {
                location.href = '/artists';
            });
        })
        .setBody("Do you really want to remove this artist?");

        $('#remove').click(function() {
            console.log('asdsa');
            ConfirmDialog.show();
        });
    });
</script>
@stop
