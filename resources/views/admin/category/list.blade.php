@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- dashboard inner -->
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Category List</h2>
                    </div>

                    @if (session('createSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check"></i>{{ session('createSuccess') }}
                                {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> --}}
                            </div>
                        </div>
                    @endif

                    @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check"></i>{{ session('deleteSuccess') }}
                                {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> --}}
                            </div>
                        </div>
                    @endif

                    @if (session('updateSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check"></i>{{ session('updateSuccess') }}
                                {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> --}}
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }}</span>
                            </h4>

                            <h4 class="text-secondary"><i class="fa fa-database"></i> - {{ $categories->total() }}</h4>
                            </h4>
                        </div>
                        <div class="col-3 offset-6">
                            <form action="{{ route('category#list') }}" method="get">
                                @csrf
                                <div class="d-flex my-3">
                                    <input type="text" name="key" class="form-control" value="{{ request('key') }}"
                                        placeholder="Search...">
                                    <button class="btn bg-dark text-white" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="full graph_head">
                            <div class="button_block">
                                <a href="{{ route('category#createPage') }}">
                                    <button type="button" class="btn cur-p btn-success"><i class="fa fa-plus"></i>Add
                                        Category</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="full graph_head">
                    <div class="button_block">
                        <a href="{{ route('category#createPage') }}">
                            <button type="button" class="btn cur-p btn-success"><i class="fa fa-plus"></i>Add
                                Category</button>
                        </a>
                    </div>
                </div>
            </div> --}}
            <!-- row -->
            <div class="row">
                <!-- table section -->
                @if (count($categories) != 0)
                    <div class="col-md-12">
                        <div class="white_shd full margin_bottom_30">
                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold">ID</th>
                                                <th class="font-weight-bold">Category Name</th>
                                                <th class="font-weight-bold">Created Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $c)
                                                <tr>
                                                    <td>{{ $c->id }}</td>
                                                    <td>{{ $c->name }}</td>
                                                    <td>{{ $c->created_at->format('F-j-Y') }}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a href=""><i class="fa fa-eye" title="View"></i></a>
                                                            <a href="{{ route('category#edit', $c->id) }}"><i
                                                                    class="fa fa-edit" title="Edit"></i></a>
                                                            <a href="{{ route('category#delete', $c->id) }}"><i
                                                                    class="fa fa-trash" title="Delete"></i></a>
                                                            <a href=""><i class="fa fa-folder"
                                                                    title="More"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <h3 class="text-secondary text-center mt-5">There is no Category Here!</h3>
                @endif
            </div>
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
@endsection
