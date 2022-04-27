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
<section class="page-wrapper edutim-course-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                
                <div class="course-widget course-info">
                    <div class="instructor-profile">
                        <div class="profile-info">
                            <h3>{{ $forum->title }}</h3>
                            <p>{!! $forum->content !!}</p>
                            <div class="instructor-courses">
                                <span><i class="fa fa-user"></i>{{ $forum->user->name }}</span>
                                <span><i class="fa fa-eye"></i>{{views($forum)->count()}} views</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-widget course-info">
                    <h4 class="course-title">Comments</h4>
                    @forelse ($comment as $item)
                    <div class="instructor-profile" style="padding-top: -10px !important;">
                        <div class="profile-info">
                            <p>{!! $item->content !!}</p>
                            <div class="instructor-courses">
                                <span><i class="fa fa-user"></i>{{ $item->user->name }}</span>
                                <span class="dots"></span>
                                <span><i class="fa fa-clock"></i>{{ $item->created_at->diffForHumans() }}</span>
                                @if ($item->user->id == auth()->user()->id)
                                    <span class="dots"></span>
                                    <span class="course-duration"><a href="{{ route('comment.delete', $item->id) }}"><i class="fa fa-trash"></i>
                                            Delete</a></span>
                                @elseif(auth()->user()->isAdmin == 1)
                                    <span class="dots"></span>
                                    <span class="course-duration"><a href="{{ route('comment.delete', $item->id) }}"><i class="fa fa-trash"></i>
                                            Delete</a></span>
                                @else
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                        
                    @empty
                        <h2 class="text-center" style="color: #FF1949;">Belum Ada Komentar</h2>
                    @endforelse

                    {{ $comment->links() }}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="course-sidebar">
                    <div class="course-widget single-info">
                        <form action="{{ route('comment') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                <label for="editor">Masukan Komentar Anda</label>
                                <textarea class="form-control" name="content" id="editor" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-main">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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