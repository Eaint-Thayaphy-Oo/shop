@extends('admin.layouts.master')

@section('title', 'Product List')

@section('content')
    <div class="main-content">
        <div class="row">
            <col-3 class="col-3 offset-7 mb-2">
                @if (session('updateSuccess'))
                    <div class="">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-check"></i>{{ session('updateSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </col-3>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="ms-5">
                                        <a href="{{ route('product#list') }}">
                                            <i class="fa fa-arrow-left text-dark text-decoration-none"
                                                onclick="history.back()"></i>
                                        </a>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-3 offset-2">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="" />
                                        </div>
                                        <div class="col-5 offset-2">
                                            <div class="my-3 btn bg-danger text-white d-block w-30 fs-5"><i
                                                    class="fa fa-bookmark me-2"></i>{{ $product->name }}</div>
                                            <span class="my-3 btn bg-dark text-white"><i
                                                    class="fa fa-money me-2"></i>{{ $product->price }} kyats
                                            </span>
                                            <span class="my-3 btn bg-dark text-white"><i
                                                    class="fa fa-clock-o me-2"></i>{{ $product->waiting_time }}
                                                mins</span>
                                            <span class="my-3 btn bg-dark text-white"><i
                                                    class="fa fa-clone me-2"></i>{{ $product->category_name }}
                                            </span>
                                            <span class="my-3 btn bg-dark text-white"><i
                                                    class="fa fa-eye me-2"></i>{{ $product->view_count }}
                                            </span>
                                            <span class="my-3 btn bg-dark text-white"><i
                                                    class="fa fa-clock-o me-2"></i>{{ $product->created_at->format('j-F-Y') }}
                                            </span>
                                            <div class="my-3"><i
                                                    class="fa fa-file-lines me-2"></i>{{ $product->description }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
