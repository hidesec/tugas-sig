@extends('layouts.app')

@section('title', 'Kabkot Indonesia')

@section('content')
<div id="map"></div>
@endsection

@push('scripts')
<script>
    // Initialize the map
    const map = L.map('map').setView([-3.11858, 113.8623], 5); // Centered at Sumut

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    kabkot.features.forEach(function(kabkot) {
        var marker = L.marker([kabkot.properties.latitude, kabkot.properties.longitude]).addTo(map)
            .bindPopup(kabkot.properties.alt_name);
    });
</script>
@endpush
