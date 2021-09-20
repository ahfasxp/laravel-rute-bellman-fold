@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <style>
        #mapid {
            height: 100vh;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ url('/distances') }}" method="get">
                    <div class="form-group">
                        <label for="">Pilih Lokasi Awal (Source)</label>
                        <select class="form-control" name="source" id="source">
                            <option selected="true" disabled="disabled">Pilih Lokasi Awal</option>
                            <option value="0" {{ isset($S) ? 'selected' : '' }}>Kantor Kecamatan Pabedilan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Uji Algoritma Bellman-Fold</button>
                </form>
            </div>
        </div>
        <br>
        <br>
        @if (isset($results))
            <hr>
            <h2>Hasil Pengujian Pencarian Rute Terpendek Algoritma Bellman-Fold</h2>
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
                                <button type="button" data-source="{{ $source }}"
                                    data-destination="{{ $vertex }}" class="btn btn-primary view">
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
    <div id="mapid"></div>
    @endif
@endsection

@section('script')
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
