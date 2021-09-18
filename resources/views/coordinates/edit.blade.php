@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('coordinates.update', [$coordinate]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>Edit Data</h2>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $coordinate->name }}"
                            placeholder="Masukan Nama" required>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Latitude</label>
                        <input type="text" class="form-control" name="lat" id="lat" value="{{ $coordinate->latitude }}"
                            placeholder="Masukan Latitude" required>
                        @error('lat')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Longitude</label>
                        <input type="text" class="form-control" name="long" id="long" value="{{ $coordinate->longitude }}"
                            placeholder="Masukan Longitude" required>
                        @error('long')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Vertex</label>
                        <input type="text" class="form-control" name="vertex" id="vertex" value="{{ $coordinate->vertex }}"
                            placeholder="Masukan Vertex" required>
                        @error('vertex')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('coordinates.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
