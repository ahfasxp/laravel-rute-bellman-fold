@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('kecamatan.update', [$kecamatan]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>Edit Data</h2>
                    <div class="form-group">
                        <label for="">Nama Kecamatan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $kecamatan->nama }}"
                            placeholder="Masukan Nama" required>
                        @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="asal">Titik Kordinat Kantor Kecamatan</label>
                        <select class="form-control" name="coordinate_id" id="coordinate_id">
                            <option selected="true" disabled="disabled">Pilih Kordinat</option>
                            @foreach ($coordinates as $item)
                                <option value="{{ $item->id }}" {{ $kecamatan->coordinate_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
