@extends('admin.layouts.app')

@section('content')
<div class="row">
    {{-- <div class="offset-1 col-8 mt-2 ">
        <form action="" method="POST">
            @csrf
            <div class="card">
                <div class="card-body row ">
                    <div class="col-2">
                        <label for="name" class=""> Name</label>
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

    <div class=" col-8 offset-1 mt-2" >
        @if (Session::has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                    {{Session::get('deleteSuccess')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

        @endif

        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Author Table</h3>
                <div class="card-tools">
                    <form action="{{route('admin#searchName')}}" method="post">
                        @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="adminName" class="form-control float-right" placeholder="Search" value="{{old('adminName')}}">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                </form>
                </div>

          </div>

          @if (count($admins) != 0)
              <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    @if ($admin->id == Auth::user()->id)
                    <td>
                        <a href="{{route('admin#detail',$admin->id)}}">
                          <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-circle-info"></i></button>
                        </a>
                    </td>
                    @else
                    <td>
                        <a href="{{route('admin#detail',$admin->id)}}">
                          <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-circle-info"></i></button>
                        </a>
                        <a href="{{route('admin#changeRole',$admin->id)}}" title="Change user role to Admin">
                          <button class="btn btn-sm bg-primary text-white"><i class="fa-solid fa-user-minus"></i></button>
                        </a>
                        <a href="{{route('admin#delete',$admin->id)}}">
                            <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </a>
                    </td>
                    @endif

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
                    <p class="m-3 text-red" >There is no admin you search!</p>
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
