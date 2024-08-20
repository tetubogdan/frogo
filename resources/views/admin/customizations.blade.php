@extends('layouts.app')

@section('content')
<h1>Customizations for {{ $restaurant->name }}</h1>

<form action="{{ route('admin.updateCustomizations', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="logo">Restaurant Logo</label>
        <input type="file" name="logo" id="logo" class="form-control">
    </div>
    <div class="form-group">
        <label for="banner">Restaurant Banner</label>
        <input type="file" name="banner" id="banner" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save Customizations</button>
</form>
@endsection
