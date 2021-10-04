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
                        <label for="">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten" id="kabupaten"
                            value="{{ old('kabupaten') }}" placeholder="Masukan Kabupaten"
                            >
                        @error('kabupaten')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi"
                            value="{{ old('provinsi') }}" placeholder="Masukan Provinsi"
                            >
                        @error('provinsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos"
                            value="{{ old('kode_pos') }}" placeholder="Masukan Kode Pos" >
                        @error('kode_pos')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Ketinggian</label>
                        <input type="text" class="form-control" name="ketinggian" id="ketinggian"
                            value="{{ old('ketinggian') }}" placeholder="Masukan Ketinggian" >
                        @error('ketinggian')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Luas Wilayah</label>
                        <input type="text" class="form-control" name="luas_wilayah" id="luas_wilayah"
                            value="{{ old('luas_wilayah') }}" placeholder="Masukan Luas Wilayah" >
                        @error('luas_wilayah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Penduduk</label>
                        <input type="text" class="form-control" name="jml_penduduk" id="jml_penduduk"
                            value="{{ old('jml_penduduk') }}" placeholder="Masukan Jumlah Penduduk" >
                        @error('jml_penduduk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Laki - laki</label>
                        <input type="text" class="form-control" name="jml_lk" id="jml_lk"
                            value="{{ old('jml_lk') }}" placeholder="Masukan Jumlah Laki-laki" >
                        @error('jml_lk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Perempuan</label>
                        <input type="text" class="form-control" name="jml_pr" id="jml_pr"
                            value="{{ old('jml_pr') }}" placeholder="Masukan Jumlah Perempuan" >
                        @error('jml_pr')
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
