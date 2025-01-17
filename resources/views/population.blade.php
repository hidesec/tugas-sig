@extends('layouts.app')

@section('title', 'Responsive Map with Leaflet')

@section('content')
<div id="map"></div>
@endsection

@push('scripts')
<script>
    // Initialize the map
    const map = L.map('map').setView([2.19235, 99.38122], 7); // Centered at Sumut

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    function getColor(d) {
        return d > 1000000 ? '#800026' :
            d > 500000  ? '#BD0026' :
                d > 200000  ? '#E31A1C' :
                    d > 100000  ? '#FC4E2A' :
                        d > 50000   ? '#FD8D3C' :
                            d > 20000   ? '#FEB24C' :
                                d > 10000   ? '#FED976' :
                                    '#FFEDA0';
    }

    function style(feature) {
        return {
            fillColor: getColor(feature.properties.population),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };

    // method that we will use to update the control based on feature properties passed
    info.update = function (props) {
        this._div.innerHTML = '<h4>Sumatera Utara Population</h4>' +  (props ?
            '<b>' + props.alt_name + '</b><br />' + props.population + ' people<sup>2</sup>'
            : 'Hover over a state');
    };

    info.addTo(map);

    var legend = L.control({position: 'bottomright'});

    legend.onAdd = function (map) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 10000, 20000, 50000, 100000, 200000, 500000, 1000000],
            labels = [];

        // loop through our density intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
                '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
        }

        return div;
    };

    legend.addTo(map);

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        layer.bringToFront();
        info.update(layer.feature.properties);
    }
    function resetHighlight(e) {
        geoJson.resetStyle(e.target);
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    var geoJson = L.geoJson(sumut, {style: style, onEachFeature: onEachFeature}).addTo(map);
</script>
@endpush
