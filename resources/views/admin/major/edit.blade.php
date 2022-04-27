@extends('layouts.master')

@section('title')
    Update Jurusan 
@endsection

@section('css')
    
@endsection

@section('content')
<div class="section-body">
    <h1 class="h3 mb-4 text-gray-800">Update Jurusan</h1>
    <a href="{{ route('jurusan.index') }}" class="btn btn-info mb-5">Kembali</a>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jurusan.update', $major->id) }}" method="post">
                        @csrf
                        @method('PUT')
                         
                        <div class="form-group">
                            <label for="name">Nama Jurusan</label>
                            <input type="text" name="name" class="form-control" value="{{ $major->name }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection