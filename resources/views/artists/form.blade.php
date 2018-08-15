@csrf
<div class="row">
    <div class="col-md-2"></div>
    <div class="form-group col-md-8 text-center">
        <img src="{{ $artist->image }}" alt="Artist Photo" class="image">
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row">
    <div class="form-group col-md-9">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $artist->name }}" class="form-control">
    </div>

    <div class="form-group col-md-3">
        <label for="genre">Genre</label>
        <input type="text" name="genre" id="genre" value="{{ $artist->genre }}" class="form-control">
    </div>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="text" name="image" id="image" value="{{ $artist->image }}" class="form-control">
</div>


<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control">{{ $artist->description }}</textarea>
</div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-success">Save</button>
</div>

@include('layouts.errors')
