@extends('layouts.main')


@section('header')
Edit User "{{ $user->name }}"
<button class="btn btn-danger" id="remove">Remove</button>
@stop


@section('content')
<form action="{{ action('UserController@update', $user) }}" method="POST">
    @method('PUT')
    @include('users.form')
</form>
@stop

@section('footer')
<script>
    $(document).ready(function() {
        ConfirmDialog.onConfirm(function() {
            $.ajax({
                method: 'DELETE',
                url: $('form').attr('action')
            }).then(function() {
                location.href = '/users';
            });
        })
        .setBody("Do you really want to remove this user?");

        $('#remove').click(function() {
            ConfirmDialog.show();
        });
    });
</script>
@stop
