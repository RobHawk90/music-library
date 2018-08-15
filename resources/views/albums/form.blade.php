@csrf

<div class="row">
    <div class="col-md-1"></div>
    <div class="form-group text-center col-md-10">
        <img src="{{ $album->image }}" class="image" alt="Album Cover Photo">
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row">
    <div class="form-group col-md-10">
        <label for="image">Cover Photo</label>
        <input type="text" name="image" id="image" class="form-control" value="{{ $album->image }}">
    </div>

    <div class="form-group col-md-2">
        <label for="year">Year</label>
        <input type="text" name="year" id="year" class="form-control" value="{{ $album->year }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="artist">Artist</label>
        <select name="artist_id" id="artist" class="form-control" value="{{ $album->artist_id }}">
            @foreach($artists as $artist)
            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}">
    </div>
</div>

<div class="row">
    <div class="form-group text-right col-md-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

@include('layouts.errors')
