@extends('layouts.app')

@section('title', 'Pending Restaurants')

@section('content')
    <h1>Pending Restaurants</h1>
    <ul>
        @foreach($restaurants as $restaurant)
            <li>
                {{ $restaurant->name }} - <a href="{{ route('superadmin.activate_restaurant', $restaurant->id) }}">Activate</a>
            </li>
        @endforeach
    </ul>
@endsection
