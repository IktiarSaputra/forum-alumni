@extends('layouts.apps')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<main class="site-main page-wrapper woocommerce single single-product">
    <section class="space-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold mb-4">Register</h2>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="woocommerce-form woocommerce-form-register register row">
                        @csrf
                        <div class="col-md-6">
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Nama&nbsp;<span class="required">*</span></label>
                                <input type="text"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('name') is-invalid @enderror"
                                    name="name" id="" autocomplete="name" value="{{ old('name') }}" required>
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Email&nbsp;<span class="required">*</span></label>
                                <input type="email"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('email') is-invalid @enderror"
                                    name="email" id="" autocomplete="email" value="{{ old('email') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>No. Hp&nbsp;<span class="required">*</span></label>
                                <input type="number"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('phone') is-invalid @enderror"
                                    name="phone" id="" autocomplete="phone" value="{{ old('phone') }}" required>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </p>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Jenis Kelamin&nbsp;<span class="required">*</span></label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option selected>Pilih Jenis Kelamin :</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                </select>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Lulus Tahun &nbsp;<span class="required">*</span></label>
                                <input type="text"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('year') is-invalid @enderror"
                                    name="graduation_year" id="datepicker" autocomplete="year" value="{{ old('year') }}" required>
                            
                                @error('graduation_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Lulus Jurusan&nbsp;<span class="required">*</span></label> <br>
                                @php
                                $jurusan = \DB::table('majors')->get();
                                @endphp
                                <select class="form-control select2 @error('major_id') is-invalid @enderror" name="major_id">
                                    <option selected>Pilih Jurusan :</option>
                                    @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            
                                @error('major_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Tempat Kuliah&nbsp;<span class="required">*</span></label>
                                <input type="text"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('university') is-invalid @enderror"
                                    name="university" id="" autocomplete="university" value="{{ old('university') }}" required>
                            
                                @error('university')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Fakultas&nbsp;<span class="required">*</span></label>
                                <input type="text"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('fakultas') is-invalid @enderror"
                                    name="fakultas" id="" autocomplete="fakultas" value="{{ old('fakultas') }}" required>
                            
                                @error('fakultas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Pekerjaan &nbsp;<span class="required">*</span></label>
                                <textarea name="working_in" class="form-control" id="" cols="30" rows="10" required></textarea>
                                @error('working_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Password&nbsp;<span class="required">*</span></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control @error('password') is-invalid @enderror" name="password"
                                    id="" autocomplete="new-password" value="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Konfirmasi Password&nbsp;<span class="required">*</span></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password_confirmation"
                                    id="password-confirm" autocomplete="new-password" value="">
                            </p>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label>Foto &nbsp;<span class="required">*</span></label>
                                <input type="file"
                                    class="woocommerce-Input woocommerce-Input--text input-text form-control @error('avatar') is-invalid @enderror"
                                    name="avatar" id="" autocomplete="avatar" value="{{ old('avatar') }}" required>
                            
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="woocommerce-FormRow form-row">
                                <button type="submit" class="button btn-block" name="register" value="Register">Register</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    $(document).ready(function () {
        $('.select2').select2();
    });

</script>
@endsection
