@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-4 mt-2 ms-4">
        <form action="{{route('delivery#update')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="id" value="{{$delivery->delivery_id}}">

                    <label for="cityName" class="">City Name</label>
                    <input type="text" name="cityName" id="cityName" class="form-control" placeholder="Enter delivery cityName" value="{{old('cityName',$delivery->city_name)}}">
                    @error('cityName')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="deliveryFee" class="mt-3">deliveryFee</label>
                    <input type="number" name="deliveryFee" class="form-control" placeholder="Enter Delivery Fee" value="{{old('cityName',$delivery->delivery_fees)}}">
                    @error('deliveryFee')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="longTime" class="mt-3">longTime</label>
                    <input type="number" name="longTime" class="form-control" placeholder="Enter Waiting Time(only days)" value="{{old('cityName',$delivery->long_time)}}">
                    @error('longTime')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <input type="submit" value="Update" class="btn btn-dark mt-2 offset-9">
                </div>
            </div>
        </form>
    </div>
    <div class=" col-7 mt-2" >
        @if (Session::has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                    {{Session::get('deleteSuccess')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

        @endif

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Delivery Table</h3>
                <div class="card-tools">
                    <form action="{{route('delivery#search')}}" method="post">
                        @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="deliverySearch" class="form-control float-right" placeholder="Search" value="{{old('deliverySearch')}}">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                </form>
                </div>

          </div>

          @if (count($deliveryList) != 0)
              <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Waiting_time</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($deliveryList as $dList)
                <tr>
                    <td>{{$dList->delivery_id}}</td>
                    <td>{{$dList->city_name}}</td>
                    <td>{{$dList->delivery_fees}} kyats</td>
                    <td>{{$dList->long_time}} days</td>
                    <td>
                      <a href="{{route('delivery#editPage',$dList->delivery_id)}}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                      </a>
                      <a href="{{route('delivery#delete',$dList->delivery_id)}}">
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
                    <p class="m-3 text-red">There is no delivery option!</p>
                </tr>
              </thead>
            </table>
          </div>
          @endif

        </div>
        <!-- /.card -->

    </div>
</div>

@endsection
