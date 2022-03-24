@extends('admin.layouts.app')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Product</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Review list</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title">Order List</h3>
        <div class="card-tools">
            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button> --}}
            {{-- <a class="btn btn-success pull-right" href="{{ url('/admin/products/create') }}">Add New Product</a>
            --}}

        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>User Name</td>
                <td>User email</td>
                <td>Product Name</td>
                <td>Title</td>
                <td>Comment</td>
                <td>status</td>
                <td> Action</td>


            </tr>
            @foreach ($review_list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->comment }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    {{-- <input class="status2" type="hidden" id="status2" name="status2" value="{{ $item->status }}">
                    --}}
                    {{-- <input type="submit" class="btn btn-info" value="Approved"> --}}
                    {{-- <form action="{{ url("/admin/categories/$item->id") }}" method="post"
                    style="display:inline" onSubmit="return confirm('Are you sure you want to delete?')">
                    @csrf
                    <input type="submit" class="btn btn-info" value="Not Approved">
                    </form> --}}

                    <a href="#" id="update" class="btn btn-primary" data-id="{{ $item->id }}" data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@mdo">Status</a>
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo">Status</button> --}}
                    <form action="{{ url("/admin/update_status") }}" method="post">
                        @csrf

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Review Stage</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="review_id" name="review_id" value="">

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Status</label>
                                            <input class=" form-control status2" type="text" id="status2" name="status2"
                                                value="" class="form-control" id="recipient-name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                </td>



            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>


@endsection
