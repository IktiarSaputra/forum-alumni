@extends('layouts.master')

@section('title')
Setting
@endsection

@section('css')

@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Web Setting</h1>
<div class="card">
    <div class="card-body">
        @foreach ($setting as $item)
        <form class="form-horizontal" action="{{ route('setting.update', $item->id) }}" method="post">
            @csrf
            <input type="hidden" name="cfgID" value="">
            <div class="mb-3">
                <label class="form-label">Nama Aplikasi</label>
                <input type="text" name="name_app" class="form-control @error('name_app') is-invalid @enderror" value="{{ $item->name_app }}" readonly>

                @error('name_app')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1">Deskripsi Aplikasi</label>
                <textarea class="form-control @error('about_app') is-invalid @enderror" name="about_app" id="exampleFormControlTextarea1" rows="3">{{ $item->about_app }}</textarea>
            
                @error('about_app')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="row mb-3">
                <button type="submit" name="submit" class="btn btn-success col mr-4" disabled="disabled">Simpan</button>
                <button type="button" id="btEnable" class="btn btn-info col">Edit</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection

@section('js')
<script>
    $('button[name="submit"]').prop('disabled', true);
        $('#btEnable').click(function () {
            $("input").removeAttr('readonly');
            $('button[name="submit"]').removeAttr('disabled');
        });
</script>

@if (session('update'))
<script>
    swal("Web Setting Berhasil Di Update", {
        title: "Sukses",
        icon: "success",
    });
</script>
@endif
@endsection