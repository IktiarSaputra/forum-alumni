@extends('layouts.apps')

@section('css')
<style>
    .dots {
        height: 4px;
        width: 4px;
        margin-bottom: 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block
    }

</style>
@endsection

@section('content')
<section class="section-padding course">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-main" data-toggle="modal" data-target="#exampleModal">
                        Tambah Topic
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Topic</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('forum.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control" id="title"
                                                aria-describedby="titleHelp" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="editor">Content</label>
                                            <textarea class="form-control" name="content" id="editor"
                                                rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-main btn-block">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="topbar-search">
                        <form method="get" action="#">
                            <input type="text" placeholder="Search our courses" class="form-control">
                            <label><i class="fa fa-search"></i></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <ul class="course-filter">
                <li class="active"><a href="#" data-filter=".cat1"> Semua</a></li>
                <li class=""><a href="#" data-filter=".cat2">Topic Yang Anda Buat</a></li>
            </ul>
        </div>

        <div class="row course-gallery " style="position: relative;">
            @forelse ($forum as $f)
            <div class="col-md-12 mb-4 cat1">
                <a href="{{ route('forum.show', $f->id) }}">
                    <div class="card p-3">
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2"><img src="{{ asset('user/avatar/' . $f->user->avatar) }}" alt="user" width="100" height="100"
                                    class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{ $f->user->name }}</h6>
                                <span class="m-b-15 d-block">
                                    {!! Illuminate\Support\Str::limit($f->content, 300) !!}
                                </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">{{ $f->created_at->diffForHumans() }}</span>
                                    <div class="reply">
                                        <div class="course-meta">
                                            <span class="course-student"><i class="fa fa-eye"></i>{{views($f)->count()}}</span>
                                            <span class="dots"></span>
                                            <span class="course-duration"><i class="fa fa-comments"></i>{{ $f->comment->count() }}</span>
                                            @if (auth()->user()->isAdmin == 1)
                                                <span class="dots"></span>
                                                <span class="course-duration"><a href="{{ route('forum.delete', $f->id) }}"><i class="fa fa-trash"></i>
                                                        Delete</a></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 mb-4 cat2" style="display: none">
                @if ($f->user->id == auth()->user()->id)
                    <a href="{{ route('forum.show', $f->id) }}">
                        <div class="card p-3">
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img src="{{ asset('user/avatar/' . $f->user->avatar) }}" alt="user" width="100"
                                        height="100" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">{{ $f->user->name }}</h6>
                                    <span class="m-b-15 d-block">
                                        {!! Illuminate\Support\Str::limit($f->content, 300) !!}
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2019</span>
                                        <div class="reply">
                                            <div class="course-meta">
                                                <span class="course-student"><i class="fa fa-eye"></i>{{views($f)->count()}}</span>
                                                <span class="dots"></span>
                                                <span class="course-duration"><i class="fa fa-comments"></i>{{ $f->comment->count() }}</span>
                                                <span class="dots"></span>
                                                <span class="course-duration"><a href="{{ route('forum.delete', $f->id) }}"><i class="fa fa-trash"></i> Delete</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
            @empty
            <div class="col-lg-12">
                <h2 class="text-center" style="color: #FF1949;">Tidak Ada Forum Yang Ditemukan</h2>
            </div>
            @endforelse
        </div>
    </div>
    <!--course-->
</section>
@endsection

@section('js')
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
@endsection
