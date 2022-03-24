@extends('admin.layouts.app')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Product</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Orderlist</li>
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
                <td>Customer Name</td>
                <td>Phone Number</td>
                <td>Shipping Address</td>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Total Price</td>
                <td>Payment</td>
                <td>Order Date</td>
                <td> Action</td>


            </tr>
            @foreach ($order_details as $item)
            <tr>
                <td>{{$item->id}}</td>
                {{-- <input type="hidden" name="product_id" id="product_id" value="{{ $item->product_id}}"> --}}
                <td>{{ $item->name }}</td>
                <td>{{ $item->phn_no }}</td>
                <td>{{ $item->shipping_address }}</td>



                <td>{{ $item->product_name }}</td>
                <td hidden><input type="hidden" class="order_id" name="order_id" id="order_id" value="{{ $item->id}}">
                </td>


                <td>{{ $item->quantity }}</td>
                <td>{{ $item->total_price }}</td>
                <td>{{ $item->payment_status }}</td>
                <td>{{ $item->created_at }}</td>
                <td><select class="status" name="status" id="status">
                        <option value="{{ $data = collect([
                            ['order_id' => $item->id, 'status' => '0']
                          
                        ]);}}">Processing</option>
                        <option value="{{ $data = collect([
                            ['order_id' => $item->id, 'status' => '1']
                          
                        ]);}}">OnGoing</option>
                        <option value="{{ $data = collect([
                            ['order_id' => $item->id, 'status' => '2']
                          
                        ]);}}">Complete</option>
                    </select></td>


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
