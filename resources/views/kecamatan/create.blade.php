@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('kecamatan.store') }}" method="POST">
                    @csrf
                    <h2>Tambah Data</h2>
                    <hr>
                    <div class="form-group">
                        <label for="">Nama Kecamatan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}"
                            placeholder="Masukan Nama" required>
                        @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="asal">Titik Kordinat Kantor Kepala Desa</label>
                        <select class="form-control" name="coordinate_id" id="coordinate_id">
                            <option selected="true" disabled="disabled">Pilih Kordinat</option>
                            @foreach ($coordinates as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('coordinate_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kecamatan.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
