@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>

    @if($user->role === 'superadmin')
        <h2>All Restaurants</h2>
    @else
        <h2>Your Restaurant</h2>
        <img src="{{ asset('storage/logos/' . $restaurant->logo) }}" alt="Restaurant Logo">

    @endif

    <ul>
        @foreach($restaurants as $restaurant)
            <li>{{ $restaurant->name }} - <a href="{{ route('restaurants.edit', $restaurant->id) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
