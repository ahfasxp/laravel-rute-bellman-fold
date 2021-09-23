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
                            value="{{ $desa->kecamatan }}" placeholder="Masukan Kecamatan" >
                        @error('kecamatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten" id="kabupaten"
                            value="{{ $desa->kabupaten }}" placeholder="Masukan Kabupaten" >
                        @error('kabupaten')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi"
                            value="{{ $desa->provinsi }}" placeholder="Masukan Provinsi" >
                        @error('provinsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Kode Wilayah</label>
                        <input type="text" class="form-control" name="kode_wilayah" id="kode_wilayah"
                            value="{{ $desa->kode_wilayah }}" placeholder="Masukan Kode Wilayah" >
                        @error('kode_wilayah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos"
                            value="{{ $desa->kode_pos }}" placeholder="Masukan Kode Pos" >
                        @error('kode_pos')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Ketinggian</label>
                        <input type="text" class="form-control" name="ketinggian" id="ketinggian"
                            value="{{ $desa->ketinggian }}" placeholder="Masukan Ketinggian" >
                        @error('ketinggian')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Luas Wilayah</label>
                        <input type="text" class="form-control" name="luas_wilayah" id="luas_wilayah"
                            value="{{ $desa->luas_wilayah }}" placeholder="Masukan Luas Wilayah" >
                        @error('luas_wilayah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Penduduk</label>
                        <input type="text" class="form-control" name="jml_penduduk" id="jml_penduduk"
                            value="{{ $desa->jumlah_penduduk }}" placeholder="Masukan Jumlah Penduduk" >
                        @error('jml_penduduk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Laki - laki</label>
                        <input type="text" class="form-control" name="jml_lk" id="jml_lk"
                            value="{{ $desa->jml_laki_laki }}" placeholder="Masukan Jumlah Laki-laki" >
                        @error('jml_lk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Perempuan</label>
                        <input type="text" class="form-control" name="jml_pr" id="jml_pr"
                            value="{{ $desa->jml_perempuan }}" placeholder="Masukan Jumlah Perempuan" >
                        @error('jml_pr')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="asal">Titik Kordinat Kantor Kepala Desa</label>
                        <select class="form-control" name="coordinate_id" id="coordinate_id" required>
                            <option selected="true" disabled="disabled">Pilih Kordinat</option>
                            @foreach ($coordinates as $item)
                                <option value="{{ $item->id }}" {{ $desa->coordinate_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('coordinate_id')
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
