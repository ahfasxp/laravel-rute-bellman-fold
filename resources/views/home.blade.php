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
                        <h2>1</h2>
                        <h5 class="card-title">Admin</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>13</h2>
                        <h5 class="card-title">Profil Desa</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>12</h2>
                        <h5 class="card-title">Lokasi Desa</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm btn-block">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
