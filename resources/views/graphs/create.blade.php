@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('graphs.store') }}" method="POST">
                    @csrf
                    <h2>Tambah Data</h2>
                    <hr>
                    <div class="form-group">
                        <label for="asal">Lokasi Asal</label>
                        <select class="form-control" name="source" id="source">
                            <option selected="true" disabled="disabled">Pilih Vertex</option>
                            @foreach ($coordinates as $item)
                                <option value="{{ $item->vertex }}">{{ $item->vertex }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('source')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Lokasi Tujuan</label>
                        <select class="form-control" name="destination" id="destination">
                            <option selected="true" disabled="disabled">Pilih Vertex</option>
                            @foreach ($coordinates as $item)
                                <option value="{{ $item->vertex }}">{{ $item->vertex }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('destination')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jarak/Bobot</label>
                        <input type="text" class="form-control" name="weight" id="weight" value="{{ old('weight') }}"
                            placeholder="Masukan Jarak/Bobot" required>
                        @error('weight')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('graphs.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
