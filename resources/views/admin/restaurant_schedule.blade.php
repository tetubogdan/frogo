@extends('layouts.app')

@section('content')
<h1>Edit Schedule for {{ $restaurant->name }}</h1>

<form action="{{ route('admin.updateSchedule', $restaurant->id) }}" method="POST">
    @csrf
    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
        <div class="form-group">
            <label>{{ $day }}</label>
            <input type="time" name="schedule[{{ $day }}][opening_time]" required>
            <input type="time" name="schedule[{{ $day }}][closing_time]" required>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Save Schedule</button>
</form>
@endsection
