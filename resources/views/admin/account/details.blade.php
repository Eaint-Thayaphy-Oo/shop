@extends('admin.layouts.master')

@section('title', 'Account Info')

@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Account Info</h2>
                    </div>
                </div>
            </div>

            @if (session('changeSuccess'))
                <div class="col-4 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-check"></i>{{ session('changeSuccess') }}
                    </div>
                </div>
            @endif

            @if (session('notMatch'))
                <div class="col-4 offset-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-check"></i>{{ session('notMatch') }}
                    </div>
                </div>
            @endif

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{ route('category#list') }}"><button
                                        class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Account Info</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3 offset-2">
                                            @if (Auth::user()->image == null)
                                                <img class="img-responsive" src="{{ asset('image/default_user.webp') }}"
                                                    alt="#" />
                                            @else
                                                <img class="img-responsive"
                                                    src="{{ asset('admin/images/layout_img/user_img.jpg') }}"
                                                    alt="#" />
                                            @endif
                                        </div>
                                        <div class="col-5 offset-1">
                                            <h4 class="my-3"><i class="fa fa-user"></i>{{ Auth::user()->name }}</h4>
                                            <h4 class="my-3"><i class="fa fa-envelope"></i>{{ Auth::user()->email }}</h4>
                                            <h4 class="my-3"><i class="fa fa-phone"></i>{{ Auth::user()->phone }}</h4>
                                            <h4 class="my-3"><i class="fa fa-bookmark"></i>{{ Auth::user()->address }}
                                            </h4>
                                            <h4 class="my-3"><i
                                                    class="fa fa-clock-o"></i>{{ Auth::user()->created_at->format('j/F/Y') }}
                                            </h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 offset-2 mt-3">
                                                <a href="{{ route('admin#edit') }}">
                                                    <button class="btn bg-dark text-white">
                                                        <i class="fa fa-pencil-square-o"></i>Edit Profile
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
    </div>
    <!-- end dashboard inner -->
@endsection
