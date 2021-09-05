@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-10">
                <h1>Manage Admin</h1>
            </div>
            <div class="col-sm-12 col-md-2">
                <a href="{{ route('users.create') }}">
                    <button class="btn btn-outline d-flex justify-content-center align-items-center w-100">
                        Tambah Data
                    </button>
                </a>
            </div>
        </div>
        <table id="users" class="table table-bordered responsive" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('d M Y', strtotime($user->created_at)) }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('users.show', [$user->id]) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm" href="{{ route('users.edit', [$user]) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form class="d-inline swalDeleteConfirm" action="{{ route('users.destroy', [$user]) }}"
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
                        <td colspan="6" class="text-center">Tidak Ada Data Users</td>
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
            $('#users').DataTable();
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
