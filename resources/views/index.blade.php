@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        #mapid {
            height: 500px;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div id="mapid"></div>
    </div>
@endsection

@section('script')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script>
        var mymap = L.map('mapid', {
            scrollWheelZoom: false
        }).setView([-6.8623928, 108.7405994], 13);

        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

        // var marker = L.marker([-6.8408296, 108.7493048]).addTo(mymap);
    </script>

    @foreach ($desa as $item)
        <script>
            var marker = L.marker([{!! $item->latitude !!}, {!! $item->longitude !!}]).addTo(mymap);
            marker.bindTooltip('{!! $item->name !!}', {
                permanent: true,
            });
        </script>
    @endforeach
@endsection
