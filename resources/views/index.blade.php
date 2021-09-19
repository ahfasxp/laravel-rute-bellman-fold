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
            <h1>Profil</h1>
        </div>
        <div class="p-3">
            <table class="table table-borderless table-responsive">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Tahun Pembentukan</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Dasar Hukum Pembentukan</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Nomor Kode Wilayah</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Nomor Kode Pos</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Kabupaten / Kota</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                </tbody>
            </table>
            <h3>Data Umum</h3>
            <table class="table table-borderless table-responsive">
                <tbody>
                    <tr>
                        <th>Tipologi</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Tingkat Perkembangan</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Luas Wilayah</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Jumlah Penduduk</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>a. Laki - Laki</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>b. Perempuan</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <th>Mayoritas Pekerjaan</th>
                        <th>:</th>
                        <th>Pabedilan Wetan</th>
                    </tr>
                    <tr>
                        <th>Tingkat Pendidikan Masyarakat</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>a. Lulusan Pendidikan Umum</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1. Taman Kanak - kanak</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>2. Sekolah Dasar</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>3. SMP</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>4. SMA / SMU</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>5. Akademi / D1 - D3</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>6. Sarjana</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>7. Pascasarjana</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <th>a. Lulusan Pendidikan Khusus</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1. Pondok Pesantren</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
                    </tr>
                    <tr>
                        <td>2. Pendidikan Keagamaan</td>
                        <td>:</td>
                        <td>Pabedilan Wetan</td>
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
