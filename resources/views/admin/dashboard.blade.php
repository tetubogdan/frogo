@extends('layouts.app')

@section('content')

<!-- Afișarea banner-ului -->
@if($restaurant->banner)
    <div class="banner-container position-relative mb-4">
        <img src="{{ asset('storage/banners/' . $restaurant->banner) }}" alt="Banner" class="img-fluid w-100" style="max-height: 300px; object-fit: cover;">
        <a href="{{ route('admin.editCustomizations', $restaurant->id) }}" class="position-absolute" style="top: 10px; right: 10px; color: white;">
            <i class="fas fa-edit fa-2x"></i>
        </a>
    </div>
@endif

<div class="container">
    <!-- Titlul Dashboard-ului -->
    <h2 class="text-left mb-2">{{ $restaurant->name }} Admin Dashboard</h2>
    <hr>

    <!-- Conținutul dashboard-ului poate fi adăugat aici -->
</div>

@endsection
