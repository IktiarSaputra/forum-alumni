 @extends('layouts.master')

 @section('title')
 Data Jurusan
 @endsection

 @section('css')
 <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
 @endsection

 @section('content')

 <h1 class="h3 mb-4 text-gray-800">Jurusan</h1>

 <button type="button" class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#exampleModal">
     <i class="fas fa-plus"></i> &nbsp; Tambah Jurusan
 </button>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form class="modal-part" id="modal-jurusan-part" action="{{ route('jurusan.store') }}" method="post">
                     @csrf
                     <div class="form-group">
                         <label for="name">Nama Jurusan</label>
                         <input type="text" name="name" class="form-control" placeholder="Nama Jurusan" required>
                         <p class="text-danger">{{ $errors->first('name') }}</p>
                     </div>
                     <div class="form-group">
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
                         <th>Nama</th>
                         <th>Tanggal</th>
                         <th>Opsi</th>
                     </tr>
                 </thead>
                 <tbody>
                     @php
                     $no = 1;
                     @endphp
                     @foreach ($major as $item)
                     <tr>
                         <td>
                             {{ $no++ }}
                         </td>
                         <td>
                             {{ $item->name }}
                         </td>
                         <td>
                             {{ $item->created_at }}
                         </td>
                         <td>
                             <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                     class="fas fa-edit"></i></a>
                             <a href="{{ route('jurusan.delete', $item->id) }}" class="btn btn-danger btn-sm delete"><i
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
     swal("Jurusan Berhasil Di Tambah", {
         title: "Sukses",
         icon: "success",
     });

 </script>
 @endif

 @if (session('import'))
 <script>
     swal("Jurusan Berhasil Di Import", {
         title: "Sukses",
         icon: "success",
     });

 </script>
 @endif

 @if (session('update'))
 <script>
     swal("Jurusan Berhasil Di Update", {
         title: "Sukses",
         icon: "success",
     });

 </script>
 @endif

 @if (session('delete'))
 <script>
     swal("Jurusan Berhasil Di Hapus", {
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
             text: "Jurusan Ini Akan Di Hapus Permanen!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         }).then((willDelete) => {
             if (willDelete) {
                 window.location.href = url;
             } else {
                 swal("Jurusan Tetap Tersimpan!");
             }
         });
     });

 </script>

 @if (session('error'))
 <script>
     swal("Jurusan Gagal Di Hapus", {
         title: "Jurusan Tidak Bisa Di Hapus",
         text: "Jurusan Ini Sudah Memiliki Kelas",
         icon: "error",
     });

 </script>
 @endif

 @endsection
