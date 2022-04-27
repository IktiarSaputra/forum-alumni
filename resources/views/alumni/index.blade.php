@extends('layouts.apps')

@section('css')

@endsection

@section('content')
<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>List Alumni</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            Alumni
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding course">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <p>List Alumni </p>
                </div>
                <div class="col-lg-5">
                    <div class="topbar-search">
                        <form method="get" action="{{ url()->current() }}">
                            <input type="text" placeholder="Search Nama, Tahun Lulus, Pekerjaan" name="keyword"
                                value="{{ request('keyword') }}" class="form-control">
                            <label><i class="fa fa-search"></i></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Alumni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col text-center mt-3">
                            <div id="display-picture">

                            </div>
                            <h2 class="mt-3 font-weight-bold text-dark" id="name">Nama alumni</h2>
                            <br>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @forelse ($alumni as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="team-block">
                        <div class="team-img">
                            <img src="{{ asset('user/avatar/' . $item->user->avatar) }}" alt="" class="img-fluid">
                        </div>
                        <div class="team-info">
                            <h4>{{ $item->name }}</h4>
                            <p>Pekerjaan {{ $item->working_in }}</p>
                        </div>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{ $item->id }}" class="show-detail"><i class="fa fa-eye"></i></a></li>
                            {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h2 class="text-center" style="color: #FF1949;">Tidak Ada Alumni Yang Ditemukan</h2>
                </div>
            @endforelse
        </div>

        {{ $alumni->links() }}

    </div>
</section>
@endsection

@section('js')
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
                    $('#display-picture').html('<img src="' + '{{ asset('user/avatar/') }}' + '/' + data.user.avatar + '" alt="" class="img-lg rounded-circle border shadow" style="height: 180px; width: 180px;">');
                    $('#name').html(data.name);
                    $('#email').html(data.email);
                    console.log(data.user.avatar);
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