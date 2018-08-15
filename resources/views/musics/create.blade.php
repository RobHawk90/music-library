
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Song List</h5>
        <p class="card-text">
            Click <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-song">Add Song</a> to add songs in this list.
        </p>
        <table class="table table-hover songs">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Composer</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($album->musics as $song)
                <tr key="{{ $song->id }}">
                    <td>{{ $song->order }}</td>
                    <td>{{ $song->name }}</td>
                    <td>{{ $song->duration }}</td>
                    <td>{{ $song->composer }}</td>
                    <td><button class="btn btn-danger remove">&times;</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-song" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="/musics" method="POST" name="song">
        @csrf
        <input type="hidden" name="id">
        <input type="hidden" value="{{ $album->id }}" name="album_id">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="order">Order Number</label>
                            <input type="number" name="order" id="order" class="form-control">
                        </div>

                        <div class="form-group col-md-10">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control">
                        </div>

                        <div class="form-group col-md-10">
                            <label for="composer">Composer</label>
                            <input type="text" name="composer" id="composer" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-save-music">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
