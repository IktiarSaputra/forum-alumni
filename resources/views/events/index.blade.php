@extends('layouts.apps')

@section('css')

@endsection

@section('content')
<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>List Events</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            Events
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
                    @guest
                        <p>List Events </p>
                    @else
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-main" data-toggle="modal" data-target="#exampleModal">
                            Tambah Event
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="modal-part" id="modal-event-part" action="{{ route('event.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input type="text" name="title" value="{{ old('title') }}"
                                                    class="form-control @error('title') is-invalid @enderror" placeholder="Nama event" required>
                        
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Event</label>
                                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                                    required value="{{ old('tanggal') }}">
                        
                                                @error('tanggal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jam Event</label>
                                                <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" required
                                                    value="{{ old('jam') }}">
                        
                                                @error('jam')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1">Deskripsi Event</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor"
                                                    rows="3"></textarea>
                        
                                                @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlFile1">Banner</label>
                                                <input type="file" name="banner" class="form-control-file @error('banner') is-invalid @enderror"
                                                    id="exampleFormControlFile1">
                        
                                                @error('banner')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-main btn-block">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="col-lg-5">
                    <div class="topbar-search">
                        <form method="get" action="{{ url()->current() }}">
                            <input type="text" placeholder="Search our courses" name="keyword"
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Alumni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="course-single-thumb mb-5" id="display-picture">
                        
                    </div>
                    <h3 class="single-course-title" id="title">Information About UI/UX Design Degree</h3>
                    <p id="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore
                        magna aliqua.
                        Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @forelse ($event as $item)
            <div class="col-lg-4 col-md-6">
                <div class="team-block">
                    <div class="team-img">
                        <img src="{{ asset('events/banner/' . $item->banner) }}" alt="" class="img-fluid">
                    </div>
                    <div class="team-info">
                        <h4>{{ $item->title }}</h4>
                        <p>{!! Illuminate\Support\Str::limit($item->content, 50) !!}</p>
                    </div>
                    <ul class="team-socials list-inline">
                        <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#exampleModal"
                                data-id="{{ $item->id }}" class="show-detail"><i class="fa fa-eye"></i></a></li>
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-6">
                <div class="course-block course-list-item">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="course-img">
                                <img src="{{ asset('events/banner/' . $item->banner) }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="course-content">
                                <h4><a href="#" style="text-transform: capitalize">{{ $item->title }}</a></h4>
                                <p>{!! $item->content !!}</p>
                                <div class="rating">
                                    <a href="#"><i class="fa fa-calendar-alt"></i></a>
                                    <span>{{ $item->schedule }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @empty
                <div class="col-lg-12">
                    <h2 class="text-center" style="color: #FF1949;">Tidak Ada Event Yang Ditemukan</h2>
                </div>
            @endforelse
        </div>

        {{ $event->links() }}

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
                    $.get("" + '/events/show/' + Customer_id, function (data) {
                        $('#display-picture').html('<img src="' + '{{ asset('events/banner/') }}' + '/' + data.banner + '" alt="" class="img-fluid w-100">');
                        $('#title').html(data.title);
                        $('#content').html(data.content);
                    })
                });
        
            });
        
    </script>
@endsection
