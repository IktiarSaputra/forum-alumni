@extends('layouts.master')

@section('title')
Data Event
@endsection

@section('css')
<link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Event</h1>

<button type="button" class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus"></i> &nbsp; Tambah Event
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-part" id="modal-event-part" action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Nama event" required>
                        
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Event</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required value="{{ old('tanggal') }}">

                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam Event</label>
                        <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" required value="{{ old('jam') }}">

                        @error('jam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1">Deskripsi Event</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                            id="editor" rows="3"></textarea>
                    
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlFile1">Banner</label>
                        <input type="file" name="banner" class="form-control-file @error('banner') is-invalid @enderror" id="exampleFormControlFile1">

                        @error('banner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success btn-block">Tambah</button>
                    </div>
                </form>
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
                        <th>No</th>
                        <th>Title</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Partisipasi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($event as $item)
                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $item->title }}
                        </td>
                        <td>
                            {{ date('Y-m-d',strtotime($item->schedule)) }} Jam
                            {{ date('H:i',strtotime($item->schedule)) }}
                        </td>
                        <td>{!! $item->content !!}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('event.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('event.delete', $item->id) }}" class="btn btn-danger btn-sm delete"><i
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

</script>

@if (session('insert'))
<script>
    swal("Event Berhasil Di Tambah", {
        title: "Sukses",
        icon: "success",
    });

</script>
@endif

@if (session('import'))
<script>
    swal("Event Berhasil Di Import", {
        title: "Sukses",
        icon: "success",
    });

</script>
@endif

@if (session('update'))
<script>
    swal("Event Berhasil Di Update", {
        title: "Sukses",
        icon: "success",
    });

</script>
@endif

@if (session('delete'))
<script>
    swal("Event Berhasil Di Hapus", {
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
            text: "Event Ini Akan Di Hapus Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("event Tetap Tersimpan!");
            }
        });
    });

</script>

@if (session('error'))
<script>
    swal("event Gagal Di Hapus", {
        title: "event Tidak Bisa Di Hapus",
        text: "event Ini Sudah Memiliki Kelas",
        icon: "error",
    });

</script>
@endif

@endsection
