@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <style>
        #mapid {
            height: 100vh;
        }

    </style>
@endsection


@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Source</th>
                    <td>{{ $S }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Vertex</th>
                    @for ($i = 0; $i < $V; $i++)
                        <td>{{ $i }}</td>
                    @endfor
                </tr>
                <tr>
                    <th>Distance from Source</th>
                    @foreach ($results as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Source</th>
                    <td>{{ $source->name }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Vertex</th>
                    @foreach ($vertex as $item)
                        <td>{{ $item->name }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Distance from Source</th>
                    @foreach ($results as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Lokasi Awal</th>
                    <th>Lokasi Tujuan</th>
                    <th>Jarak</th>
                    <th>Rute</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vertex as $vertex)
                    <tr>
                        <td>{{ $source->name }}</td>
                        <td>{{ $vertex->name }}</td>
                        <td>{{ $results[$loop->index] }}</td>
                        <td>
                            <button type="button" data-source="{{ $source }}" data-destination="{{ $vertex }}"
                                class="btn btn-primary view">
                                Lihat
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
    </div>
    <div class="container-fluid">
        <div id="mapid"></div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet.icon.glyph@0.2.0/Leaflet.Icon.Glyph.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

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

        $('.view').click(function(e) {
            let source = JSON.parse($(this).attr('data-source'));
            let destination = JSON.parse($(this).attr('data-destination'));

            L.Routing.control({
                waypoints: [
                    L.latLng(source.latitude, source.longitude),
                    L.latLng(destination.latitude, destination.longitude)
                ],
                createMarker: function(i, wp) {
                    return L.marker(wp.latLng, {
                        draggable: true,
                        icon: L.icon.glyph({
                            glyph: String.fromCharCode(65 + i)
                        })
                    });
                },
                geocoder: L.Control.Geocoder.nominatim(),
                routeWhileDragging: false
            }).addTo(mymap);

            // $(".leaflet-routing-alternatives-container").before("<div><p>${source.name}</p></div>");
        });
    </script>
@endsection
