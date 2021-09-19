@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-10">
                <h1>Manage Admin</h1>
            </div>
            <div class="col-sm-12 col-md-2">
                <a href="{{ route('desa.create') }}">
                    <button class="btn btn-primary">
                        Tambah Data
                    </button>
                </a>
            </div>
        </div>
        <hr>
        <table id="desa" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Kode Wilayah</th>
                    <th>Kode Pos</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse($desa as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kecamatan }}</td>
                        <td>{{ $item->kabupaten }}</td>
                        <td>{{ $item->provinsi }}</td>
                        <td>{{ $item->kode_wilayah }}</td>
                        <td>{{ $item->kode_pos }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm mb-1" href="{{ route('desa.show', [$item->id]) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('desa.edit', [$item]) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form class="d-inline swalDeleteConfirm" action="{{ route('desa.destroy', [$item]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak Ada Data Desa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <!-- DataTable -->
    <script>
        $(function() {
            $('#desa').DataTable();
        });
    </script>

    <!--SweetAlert2 Delete Confirm-->
    <script type="text/javascript">
        $(function() {
            $('.swalDeleteConfirm').click(function() {
                var form = this;
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        return form.submit();
                    }
                })
            });
        })
    </script>
@endsection
