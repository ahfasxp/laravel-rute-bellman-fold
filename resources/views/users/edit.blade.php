@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('users.update', [$user]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>Edit Data</h2>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"
                            placeholder="Masukan Nama" required>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                            placeholder="Masukan Email" required>
                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukan Password">
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password Confirmasi</label>
                        <input type="password" class="form-control" name="re-password" id="re-password"
                            placeholder="Masukan Password Confirmasi">
                        @error('re-password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
