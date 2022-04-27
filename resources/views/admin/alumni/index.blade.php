@extends('layouts.master')

@section('title')
Data Alumni
@endsection

@section('css')
<link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Alumni</h1>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Detail Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center mt-3">
                        <img alt="picture" src="assets/images/course/course1.jpg" id="img-picture"
                            class="img-lg rounded-circle border shadow" width="150" height="150" />
                        <h2 class="mt-3 font-weight-bold text-dark" id="name">Nama lumni</h2>
                        <table class="table table-bordered">
                            <tr>
                                <th>Email</th>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <th>No Hp</th>
                                <td id="phone"></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td id="gender"></td>
                            </tr>
                            <tr>
                                <th>Lulus Tahun</th>
                                <td id="graduation_year"></td>
                            </tr>
                            <tr>
                                <th>Lulus Jurusan</th>
                                <td id="major_id"></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td id="work"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Jenis Kelamin</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumni as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->email }}
                        </td>
                        <td>
                            {{ $item->phone }}
                        </td>
                        <td>
                            {{ $item->gender }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm show-detail" data-toggle="modal"
                                data-id="{{ $item->id }}" data-target="#exampleModal">
                                <i class="fas fa-eye"></i></a>
                            </button>
                            <a href="{{ route('alumni.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('alumni.delete', $item->id) }}" class="btn btn-danger btn-sm delete"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>

@if (session('insert'))
<script>
    swal("Alumni Berhasil Di Tambah", {
        title: "Sukses",
        icon: "success",
    });

</script>
@endif

@if (session('import'))
<script>
    swal("Alumni Berhasil Di Import", {
        title: "Sukses",
        icon: "success",
    });

</script>
@endif

@if (session('update'))
<script>
    swal("Alumni Berhasil Di Update", {
        title: "Sukses",
        icon: "success",
    });

</script>
@endif

@if (session('delete'))
<script>
    swal("Alumni Berhasil Di Hapus", {
        title: "Success",
        icon: "success",
    });

</script>
@endif

<script>
    $('.delete').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: "Apa Kamu Yakin?",
            text: "Alumni Ini Akan Di Hapus Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Alumni Tetap Tersimpan!");
            }
        });
    });

</script>

@if (session('error'))
<script>
    swal("alumni Gagal Di Hapus", {
        title: "alumni Tidak Bisa Di Hapus",
        text: "alumni Ini Sudah Memiliki Kelas",
        icon: "error",
    });

</script>
@endif

<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.show-detail', function () {
            var Customer_id = $(this).data('id');
            $.get("" + '/alumni/show/' + Customer_id, function (data) {
                $('#img-picture').src = data['company_name'];
                $('#name').html(data.name);
                $('#email').html(data.email);
                $('#phone').html(data.phone);
                $('#gender').html(data.gender);
                $('#graduation_year').html(data.graduation_year);
                $('#work').html(data.working_in);
                $.get("" + '/alumni/details/' + Customer_id, function (html) {
                   $('#major_id').html(html.name);
                });
            })
        });

    });

</script>

@endsection
