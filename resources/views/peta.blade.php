@extends('layouts.app')

@section('title', 'Responsive Map with Leaflet')

@section('content')
<div id="map"></div>
@endsection

@push('scripts')
<script>
    // Initialize the map
    const map = L.map('map').setView([-3.6688, 119.9741], 7); // Centered at South Sulawesi

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Legend
    const legend = L.control({ position: 'bottomright' });

    legend.onAdd = function (map) {
        const div = L.DomUtil.create('div', 'legend');
        div.innerHTML += '<i style="background: #ffffcc"></i><span>0-10</span><br>';
        div.innerHTML += '<i style="background: #ffeda0"></i><span>10-20</span><br>';
        div.innerHTML += '<i style="background: #feb24c"></i><span>20-50</span><br>';
        div.innerHTML += '<i style="background: #fd8d3c"></i><span>50-100</span><br>';
        div.innerHTML += '<i style="background: #f03b20"></i><span>100-500</span><br>';
        div.innerHTML += '<i style="background: #bd0026"></i><span>500-1000+</span><br>';
        return div;
    };

    legend.addTo(map);
</script>
@endpush
