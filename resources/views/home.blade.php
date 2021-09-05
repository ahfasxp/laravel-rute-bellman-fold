@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
        <hr>
        <h3>
            Sistem Pencarian Rute Terpendek Menuju Kantor Kepala Desa<br>
            Menggunakan Metode Algoritma Bellman-Fold.
        </h3>
    </div>
@endsection
