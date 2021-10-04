@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
        <hr>
        <h3 class="mb-5">
            Sistem Pencarian Rute Terpendek Menuju Kantor Kepala Desa<br>
            Menggunakan Metode Algoritma Bellman-Fold.
        </h3>
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $users }}</h2>
                        <h5 class="card-title">Admin</h5>
                        <a href="{{ url('/admin/users') }}" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $desa }}</h2>
                        <h5 class="card-title">Desa</h5>
                        <a href="{{ url('/admin/desa') }}" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $kecamatan }}</h2>
                        <h5 class="card-title">Kecamatan</h5>
                        <a href="{{ url('/admin/kecamatan') }}" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $kordinat }}</h2>
                        <h5 class="card-title">Koordinat</h5>
                        <a href="{{ url('/admin/coordinates') }}" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $graphs }}</h2>
                        <h5 class="card-title">Graph</h5>
                        <a href="{{ url('/admin/graphs') }}" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
