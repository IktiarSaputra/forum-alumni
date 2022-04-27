@extends('layouts.master')

@section('title')
Update Event
@endsection

@section('css')

@endsection

@section('content')
<div class="section-body">
    <h1 class="h3 mb-4 text-gray-800">Update Event</h1>
    <a href="{{ route('jurusan.index') }}" class="btn btn-info mb-5">Kembali</a>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('event.update', $event->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" value="{{ $event->title }}" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Nama event" required>
                        
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Event</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required
                                value="{{ date('Y-m-d',strtotime($event->schedule)) }}">
                        
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam Event</label>
                            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" required
                                value="{{ date('H:i',strtotime($event->schedule)) }}">
                        
                            @error('jam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1">Deskripsi Event</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor"
                                rows="3">{!! $event->content !!}</textarea>
                        
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlFile1">Banner</label>
                            <input type="file" name="banner" value="{{ $event->banner }}" class="form-control-file @error('banner') is-invalid @enderror"
                                id="exampleFormControlFile1">
                        
                            @error('banner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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