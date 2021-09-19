@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-10">
                <h1>Nilai Graph</h1>
            </div>
            <div class="col-sm-12 col-md-2">
                <a href="{{ route('graphs.create') }}">
                    <button class="btn btn-primary">
                        Tambah Data
                    </button>
                </a>
            </div>
        </div>
        <hr>
        <table id="graph" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi Asal</th>
                    <th>Lokasi Tujuan</th>
                    <th>Jarak/Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse($graphs as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->source }}</td>
                        <td>{{ $item->destination }}</td>
                        <td>{{ $item->weight }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('graphs.show', [$item->id]) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm" href="{{ route('graphs.edit', [$item]) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form class="d-inline swalDeleteConfirm" action="{{ route('graphs.destroy', [$item]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak Ada Data Desa</td>
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
            $('#graph').DataTable();
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
