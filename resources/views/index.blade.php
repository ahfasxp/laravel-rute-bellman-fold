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

        .table th,
        .table td {
            padding: 0.50rem;
            vertical-align: middle;
        }

    </style>
@endsection

@section('content')
    <h2 class="text-center">Peta Sebaran Kantor Kepala Desa di Kecamatan Pabedilan</h2>

    <div id="sidebar">
        <div class="bg-success p-2 text-white">
            <h1 id="title">Profil</h1>
        </div>
        <div class="p-3">
            <table class="table table-borderless table-responsive">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th id="nama"></th>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <th>:</th>
                        <th id="kecamatan"></th>
                    </tr>
                    <tr>
                        <th>Kabupaten / Kota</th>
                        <th>:</th>
                        <th id="kabupaten"></th>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <th>:</th>
                        <th id="provinsi"></th>
                    </tr>
                    <tr>
                        <th>Kode Wilayah</th>
                        <th>:</th>
                        <th id="kode-wilayah"></th>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <th>:</th>
                        <th id="kode-pos"></th>
                    </tr>
                    <tr>
                        <th>Ketinggian</th>
                        <th>:</th>
                        <th id="ketinggian"></th>
                    </tr>
                    <tr>
                        <th>Luas Wilayah</th>
                        <th>:</th>
                        <th id="luas-wilayah"></th>
                    </tr>
                    <tr>
                        <th>Jumlah Penduduk</th>
                        <th>:</th>
                        <th id="jml-penduduk"></th>
                    </tr>
                    <tr>
                        <td>a. Laki - Laki</td>
                        <td>:</td>
                        <td id="jml-lk"></td>
                    </tr>
                    <tr>
                        <td>b. Perempuan</td>
                        <td>:</td>
                        <td id="jml-pr"></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
            var marker = L.marker([{!! $item->coordinate->latitude !!}, {!! $item->coordinate->longitude !!}]).addTo(mymap);
            marker.bindTooltip('{!! $item->nama !!}', {
                permanent: false,
            }).on('click', markerOnClick);

            function markerOnClick(e) {
                $.ajax({
                    url: "/desa/" + {{ $item->id }},
                    success: function(data) {
                        $('#title').text(data.nama);
                        $('#nama').text(data.nama);
                        $('#kecamatan').text(data.kecamatan);
                        $('#kabupaten').text(data.kabupaten);
                        $('#provinsi').text(data.provinsi);
                        $('#kode-wilayah').text(data.kode_wilayah);
                        $('#kode-pos').text(data.kode_pos);
                        $('#ketinggian').text(data.ketinggian);
                        $('#luas-wilayah').text(data.luas_wilayah);
                        $('#jml-penduduk').text(data.jumlah_penduduk);
                        $('#jml-lk').text(data.jml_laki_laki);
                        $('#jml-pr').text(data.jml_perempuan);
                    },
                    error: function() {
                        console.log("There was an error.");
                    }
                });

                sidebar.show();
            }
        </script>
    @endforeach

    @foreach ($kecamatan as $item)
        <script>
            var marker = L.marker([{!! $item->coordinate->latitude !!}, {!! $item->coordinate->longitude !!}]).addTo(mymap);
            marker.bindTooltip('{!! $item->nama !!}', {
                permanent: false,
            }).on('click', markerOnClick);

            function markerOnClick(e) {
                $.ajax({
                    url: "/kecamatan/" + {{ $item->id }},
                    success: function(data) {
                        $('#title').text(data.nama);
                    },
                    error: function() {
                        console.log("There was an error.");
                    }
                });

                sidebar.show();
            }
        </script>
    @endforeach
@endsection
