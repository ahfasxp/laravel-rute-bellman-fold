@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="content-3-7 overflow-hidden container-xxl mx-auto position-relative">
            <div class="container mx-auto">
                <div class="d-flex flex-column text-center w-100" style="margin-bottom: 2.25rem">
                    <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
                    <p>
                        Sistem Pencarian Rute Terpendek Menuju Kantor Kepala Desa <br>
                        di Kecamatan Pabedilan
                    </p>
                </div>
                <div class="d-flex flex-wrap">
                    <div class="mx-auto card-item position-relative">
                        <div class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                            <h1>2</h1>
                            <h2>Admin</h2>
                            <button class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div class="mx-auto card-item position-relative">
                        <div class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                            <h1>13</h1>
                            <h2>Profil Desa</h2>
                            <button class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div class="mx-auto card-item position-relative">
                        <div class="card-item-outline bg-white d-flex flex-column position-relative overflow-hidden h-100">
                            <h1>13</h1>
                            <h2>Lokasi Desa</h2>
                            <button class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                                Lihat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
