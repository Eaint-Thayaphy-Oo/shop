@extends('admin.layouts.master')

@section('title', 'Product Page')

@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Create Page</h2>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{ route('product#list') }}"><button
                                        class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Create Your Product</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('product#create') }}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="productName" type="text"
                                                class="form-control @error('productName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Your Product Name...">
                                            @error('productName')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Category</label>
                                            <select name="productCategory" class="form-control">
                                                @foreach ($categories as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Description</label>
                                            <textarea id="cc-pament" name="productDescription" type="text"
                                                class="form-control @error('productDescription') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                                placeholder="Enter Description..."></textarea>
                                            @error('productDescription')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Image</label>
                                            <input id="cc-pament" name="productImage" type="file"
                                                class="form-control @error('productImage') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Product Image...">
                                            @error('productImage')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="productPrice" type="text"
                                                class="form-control @error('productPrice') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Product Price...">
                                            @error('productPrice')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="productWaitingTime" type="text"
                                                class="form-control @error('productWaitingTime') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Waiting Time...">
                                            @error('productWaitingTime')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Create</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
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
