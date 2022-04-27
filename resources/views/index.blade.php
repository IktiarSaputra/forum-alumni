@extends('layouts.apps')

@section('css')
    
@endsection

@section('content')
    <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <form action="" class="search-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <h3>Search Your keyword</h3>
                            <input type="text" class="form-control" placeholder="Search..." />
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <img class="search-close" src="assets/images/close.png"
                                    srcset="assets/images/close@2x.png 2x" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--search overlay end-->
    <section class="banner banner-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="banner-content center-heading">
                        <span class="subheading">Welcome To</span>
                        <h1>{{ DB::table('settings')->latest()->first()->name_app }}</h1>
                        <p>{{ DB::table('settings')->latest()->first()->about_app }} </p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    
    
    <section class="counter-wrap mt--105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 counter-inner">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item">
                                <i class="ti-user"></i>
                                <div class="count">
                                    <span class="counter h2">
                                        {{ DB::table('alumnis')->count() }}
                                    </span>
                                </div>
                                <p>Total Alumni</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item">
                                <i class="ti-comments"></i>
                                <div class="count">
                                    <span class="counter h2">{{ DB::table('forums')->count() + DB::table('comments')->count() }}</span>
                                </div>
                                <p>Total Diskusi</p>
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item">
                                <i class="ti-calendar"></i>
                                <div class="count">
                                    <span class="counter h2">
                                        {{ DB::table('events')->count() }}
                                    </span>
                                </div>
                                <p>Total Events</p>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    
    <section class="section-padding popular-course pb-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="section-heading center-heading">
                        <span class="subheading">Event Terbaru</span>
                        <h3>Let's Join The Event</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($event as $e)
                    <div class="col-lg-6 col-md-6">
                        <div class="course-block course-list-item">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="course-img">
                                        <img src="{{ asset('events/banner/' . $e->banner) }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="course-content">
                    
                                        <h4><a href="#" style="text-transform: capitalize">{{ $e->title }}</a></h4>
                                        <p>{!! $e->content !!}</p>
                                        <div class="rating">
                                            <a href="#"><i class="fa fa-calendar-alt"></i></a>
                                            <span>{{ $e->schedule }}</span>     
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <h2 class="text-center" style="color: #FF1949;">Tidak Ada Event Yang Ditemukan</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-padding popular-course pb-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="section-heading center-heading">
                        <span class="subheading">Step Join</span>
                        <h3>Step By Step To Join</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <img src="{{ asset('9814.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="process-block">
                        <i class="fa fa-user-plus"></i>
                        <div class="process-desc">
                            <h3>Create a new account</h3>
                            <p>Please register to create a new account</p>
                        </div>
                    </div>
            
                    <div class="process-block">
                        <i class="fa fa-user-edit"></i>
                        <div class="process-desc">
                            <h3>Enter your personal data</h3>
                            <p>Please enter your complete data</p>
                        </div>
                    </div>
            
                    <div class="process-block ">
                        <i class="fa fa-user-check"></i>
                        <div class="process-desc no-divider">
                            <h3>Account created successfully</h3>
                            <p>Congratulations, you have successfully registered as an alumni</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="process section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="section-heading">
                        <span class="subheading">Top Categories</span>
                        <h3>Learn new skills to go ahead for your career</h3>
                    </div>
    
                    <div class="process-block">
                        <i class="bi bi-film"></i>
                        <div class="process-desc">
                            <h4>Register in site</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit</p>
                        </div>
                    </div>
    
                    <div class="process-block">
                        <i class="bi bi-film"></i>
                        <div class="process-desc">
                            <h4>Choose your course</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit</p>
                        </div>
                    </div>
    
                    <div class="process-block ">
                        <i class="bi bi-film"></i>
                        <div class="process-desc no-divider">
                            <h4>Purchase now</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-main-2"><i class="fa fa-check mr-2"></i>more About Support</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    
@endsection