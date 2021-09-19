@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/L.Control.Sidebar.css') }}" />

    <style>
        #mapid {
            height: 100vh;
        }

        .leaflet-control {
            position: initial;
        }

    </style>
@endsection

@section('content')
    <h2 class="text-center">Peta Sebaran Kantor Kepala Desa di Kecamatan Pabedilan</h2>

    <div id="sidebar">
        <h1>Profil</h1>

        <p>A responsive sidebar plugin for for <a href="http://leafletjs.com/">Leaflet</a>, a JS library for interactive
            maps.</p>

        <p><b>Click on the marker to show the sidebar again when you've closed it.</b></p>

        <p>Other examples:</p>

        <ul>
            <li><a href="listing-markers.html">listing-markers example</a></li>
            <li><a href="two-sidebars.html">two-sidebars example</a></li>
        </ul>

        <p class="lorem">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
            dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
            aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
            gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

        <p class="lorem">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
            dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
            aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
            gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

        <p class="lorem">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
            dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
            aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
            gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>

        <p class="lorem">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
            dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
            aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
            gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    </div>

    <div id="mapid"></div>
@endsection

@section('script')
    <script src="{{ asset('js/L.Control.Sidebar.js') }}"></script>

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

        var sidebar = L.control.sidebar('sidebar', {
            closeButton: true,
            position: 'right'
        });
        mymap.addControl(sidebar);

        mymap.on('click', function() {
            sidebar.hide();
        })
    </script>

    @foreach ($desa as $item)
        <script>
            var marker = L.marker([{!! $item->latitude !!}, {!! $item->longitude !!}]).addTo(mymap);
            marker.bindTooltip('{!! $item->name !!}', {
                permanent: false,
            }).on('click', markerOnClick);

            function markerOnClick(e) {
                sidebar.toggle();
            }
        </script>
    @endforeach
@endsection
