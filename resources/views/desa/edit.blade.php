@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('desa.update', [$desa]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>Edit Data</h2>
                    <div class="form-group">
                        <label for="">Nama Desa</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $desa->nama }}"
                            placeholder="Masukan Nama" required>
                        @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                            value="{{ $desa->kecamatan }}" placeholder="Masukan Kecamatan" required>
                        @error('kecamatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten" id="kabupaten"
                            value="{{ $desa->kabupaten }}" placeholder="Masukan Kabupaten" required>
                        @error('kabupaten')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi"
                            value="{{ $desa->provinsi }}" placeholder="Masukan Provinsi" required>
                        @error('provinsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Kode Wilayah</label>
                        <input type="text" class="form-control" name="kode_wilayah" id="kode_wilayah"
                            value="{{ $desa->kode_wilayah }}" placeholder="Masukan Kode Wilayah" required>
                        @error('kode_wilayah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos"
                            value="{{ $desa->kode_pos }}" placeholder="Masukan Kode Pos" required>
                        @error('kode_pos')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="asal">Titik Kordinat Kantor Kepala Desa</label>
                        <select class="form-control" name="kordinat" id="kordinat">
                            <option selected="true" disabled="disabled">Pilih Kordinat</option>
                            @foreach ($coordinates as $item)
                                <option value="{{ $item->id }}" {{ $desa->coordinate_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('kordinat')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('desa.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
