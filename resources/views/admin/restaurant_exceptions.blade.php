@extends('layouts.app')

@section('content')
<h1>Edit Exceptions for {{ $restaurant->name }}</h1>

<form action="{{ route('admin.updateExceptions', $restaurant->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="exceptions[date][]" class="form-control">
        <label for="is_closed">Closed</label>
        <input type="checkbox" name="exceptions[is_closed][]" value="1">
    </div>
    <button type="submit" class="btn btn-primary">Save Exceptions</button>
</form>
@endsection
