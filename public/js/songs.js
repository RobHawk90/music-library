$(document).ready(function() {
    var $dialog = $('#modal-song');

    var $tableSongs = $('table.songs');
    var $tbodySongs = $tableSongs.find('tbody');

    var $form = $('form[name=song]');
    var $id = $form.find('input[name=id]');
    var $order = $form.find('input[name=order]');
    var $composer = $form.find('input[name=composer]');
    var $name = $form.find('input[name=name]');
    var $duration = $form.find('input[name=duration]');

    var dtSongs = $tableSongs.DataTable({
        paginate: false,
        createdRow: function(row, data) {
            $(row).attr('key', data.id);
        }
    });

    $form.submit(function(e) {
        e.preventDefault();

        var data = $form.serializeArray();
        var url = $form.attr('action');

        $.post(url, data).then(function(song) {
            _addSong(song);
            $dialog.modal('hide');
        });
    });

    $tbodySongs.on('click', 'tr', function() {
        var id = $(this).attr('key');

        $.get('/musics/' + id).then(function(music) {
            $id.val(music.id);
            $name.val(music.name);
            $order.val(music.order);
            $composer.val(music.composer);
            $duration.val(music.duration);
            $dialog.modal('show');
        });

        console.log('MODAL');
    });

    $tbodySongs.on('click', '.remove', function(e) {
        e.stopPropagation();

        var $tr = $(this).closest('tr');
        var id = $tr.attr('key');

        var confirmation = confirm('Are you sure that you need to remove this?');
        if(confirmation)
            $.ajax({
                method: 'DELETE',
                url: '/musics/' + id
            }).then(function(data) {
                dtSongs.row($tr).remove().draw(false);
                Toast.showSuccess('The song was removed');
            });
    });

    function _addSong(song) {
        var row = dtSongs.row($('tr[key=' + song.id + ']'));

        if(row)
            row.remove();

        var node = dtSongs.row.add([
            song.order,
            song.name,
            song.duration,
            song.composer,
            '<button class="btn btn-danger remove">&times;</button>'
        ]).node();

        $(node).attr('key', song.id);

        dtSongs.draw(false);
    }
});
