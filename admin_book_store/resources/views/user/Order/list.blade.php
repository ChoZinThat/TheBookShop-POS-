@extends('admin.layouts.app')

@section('content')
<div class="row">
    {{-- <div class="offset-1 col-8 mt-2 ">
        <form action="{{route('writer#create')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body row ">
                    <div class="col-2">
                        <label for="name" class="">Author Name</label>
                    </div>

                    <div class="col-7">
                        <input type="text" name="name" id="name" class="form-control " placeholder="Enter author name" value="{{old('name')}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-2">
                        <input type="submit" value="Save" class="btn btn-dark" >
                    </div>

                </div>
            </div>
        </form>
    </div> --}}
    <div class=" col-10 offset-1 mt-2" >
        @if (Session::has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                    {{Session::get('deleteSuccess')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

        @endif

        <div class="row">

            <div class="@if(!empty($orderDetail)) col-6  @else col-8 offset-1 @endif">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Author Table</h3>
                            <div class="card-tools">
                                <form action="{{route('writer#search')}}" method="post">
                                    @csrf
                                <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="WriterSearch" class="form-control float-right" placeholder="Search" value="{{old('WriterSearch')}}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                </div>
                            </form>
                            </div>

                    </div>

                    @if (count($orders) != 0)
                        <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                            <th>User Name</th>
                            <th>Order Code</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->user_name}}</td>
                                <td>{{$order->order_code}}</td>
                                <td>
                                <a href="{{route('userOrder#details',$order->order_code)}}">
                                    <button class="btn btn-sm bg-dark text-white"><i class="fa fa-info px-1" aria-hidden="true"></i></button>
                                </a>
                                <a href="{{route('userOrder#delete',$order->order_code)}}">
                                    <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    @else
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr >
                                <p class="m-3 text-red" >There is no order</p>
                            </tr>
                        </thead>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

            {{-- user order detail --}}
            <div class="col ms-5 mt-4 " style="@if(empty($orderDetail)) display: none; @endif">
                <div class="card shadow-lg">

                    @if(!empty($orderDetail) && !empty($orderDetailInfo))

                    <div class="card-header">
                        <div class="row">
                            <p class="col">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="text-success font-weight-bold"> - {{$orderDetailInfo->user_name}}</span>
                            </p>
                            <p class="col">
                                <i class="fa fa-barcode" aria-hidden="true"></i><i class="fa fa-barcode" aria-hidden="true"></i>
                                <span class="text-success font-weight-bold"> - {{$orderDetailInfo->order_code}}</span>
                            </p>
                        </div>
                        <div class="row">
                            <p class="col">
                                <span><i class="fas fa-biking"></i>- {{$orderDetailInfo->city_name}}</span>
                            </p>
                            <p class="col">
                                <span><i class="fas fa-biking"></i>- {{$orderDetailInfo->delivery_fee}}</span>
                            </p>
                            <p class="col-12">
                                <span>Total Pirce- {{$orderDetailInfo->total_price}}</span>
                            </p>
                        </div>
                    </div>


                    <div class="card-body bg-success">
                        <table class="row text-center">
                            <thead class="col-12 shadow-sm">
                                <tr class="row">
                                    <th class="col">Book Name</th>
                                    <th class="col">Qty</th>
                                    <th class="col">Price</th>
                                </tr>
                            </thead>

                            <tbody class="col-12 mt-3">
                                @foreach ($orderDetail as $o)
                                <tr class="row shadow-sm">
                                    <th class="col">{{$o->book_name}}</th>
                                    <th class="col">{{$o->qty}}</th>
                                    <th class="col">{{$o->total_price}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- /.card -->

    </div>
</div>

@endsection
