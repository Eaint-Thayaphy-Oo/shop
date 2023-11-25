@extends('admin.layouts.master')

@section('title', 'My Profile')

@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>My Profile</h2>
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
                                <a href="{{ route('admin#details') }}"><button
                                        class="btn bg-dark text-white my-3">Back</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">My Profile</h3>
                                    </div>
                                    <hr>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-4 offset-1">
                                                @if (Auth::user()->image == null)
                                                    <img class="img-responsive" src="{{ asset('image/default_user.webp') }}"
                                                        alt="#" />
                                                @else
                                                    <img class="img-responsive"
                                                        src="{{ asset('admin/images/layout_img/user_img.jpg') }}"
                                                        alt="#" />
                                                @endif
                                                <div class="mt-3">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <div class="mt-3">
                                                    <button class="btn bg-dark text-white">
                                                        <i class="fa fa-cloud-upload"></i>Update
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row col-5">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                                    <input id="cc-pament" name="name" type="text"
                                                        value="{{ old('name', Auth::user()->name) }}"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        aria-required="true" aria-invalid="false" placeholder="">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                                    <input id="cc-pament" name="email" type="text"
                                                        value="{{ old('email', Auth::user()->email) }}"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        aria-required="true" aria-invalid="false" placeholder="">
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Phone</label>
                                                    <input id="cc-pament" name="phone" type="text"
                                                        value="{{ old('phone', Auth::user()->phone) }}"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        aria-required="true" aria-invalid="false" placeholder="">
                                                    @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Gender</label>
                                                    <select name="gender"
                                                        value="{{ old('gender', Auth::user()->gender) }}"
                                                        class="form-control @error('gender') is-invalid @enderror"
                                                        aria-required="true" aria-invalid="false">
                                                        <option value="Choose gender..."></option>
                                                        <option value="male"
                                                            @if (Auth::user()->gender == 'male') selected @endif>Male</option>
                                                        <option value="female"
                                                            @if (Auth::user()->gender == 'female') selected @endif>Female
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Address</label>
                                                    <textarea id="cc-pament" name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                                        aria-required="true" aria-invalid="false" placeholder="">{{ old('address', Auth::user()->address) }}</textarea>
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </form>
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
