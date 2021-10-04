@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-10">
                <h1>Manage Kecamatan</h1>
            </div>
            <div class="col-sm-12 col-md-2">
                <a href="{{ route('kecamatan.create') }}">
                    <button class="btn btn-primary">
                        Tambah Data
                    </button>
                </a>
            </div>
        </div>
        <hr>
        <table id="kecamatan" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse($kecamatan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kabupaten }}</td>
                        <td>{{ $item->provinsi }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                                data-target="#kecamatan{{ $item->id }}">
                                <i class="fas fa-folder">
                                </i>
                                Lihat
                            </a>
                            <a class="btn btn-success btn-sm mb-1" href="{{ route('kecamatan.edit', [$item]) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form class="d-inline swalDeleteConfirm" action="{{ route('kecamatan.destroy', [$item]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="kecamatan{{ $item->id }}" role="dialog"
                        aria-labelledby="modal-kecamatan" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Detail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">Nama : {{ $item->nama }}</li>
                                        <li class="list-group-item">Kabupaten : {{ $item->kabupaten }}</li>
                                        <li class="list-group-item">Provinsi : {{ $item->provinsi }}</li>
                                        <li class="list-group-item">Kode Pos : {{ $item->kode_pos }}</li>
                                        <li class="list-group-item">Ketinggian : {{ $item->ketinggian }}</li>
                                        <li class="list-group-item">Luas Wilayah : {{ $item->luas_wilayah }}</li>
                                        <li class="list-group-item">Jumlah Penduduk : {{ $item->jumlah_penduduk }}</li>
                                        <li class="list-group-item">Jumlah Laki - laki : {{ $item->jml_laki_laki }}</li>
                                        <li class="list-group-item">Jumlah perempuan : {{ $item->jml_perempuan }}</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data Kecamatan</td>
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
            $('#kecamatan').DataTable();
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
