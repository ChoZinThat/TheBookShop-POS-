@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="offset-1 col-8 mt-2 ">
        <form action="{{route('user#searchName')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body row ">
                    <div class="col-2">
                        <label for="name" class="">User Name</label>
                    </div>

                    <div class="col-7">
                        <input type="text" name="name" id="name" class="form-control " placeholder="Enter author name" value="{{old('name')}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-2">
                        <input type="submit" value="Search" class="btn btn-dark" >
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class=" col-8 offset-1 mt-2" >
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
            <h3 class="card-title">Author Table</h3>
                <div class="card-tools">
                    <form action="{{route('user#searchName')}}" method="post">
                        @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="userName" class="form-control float-right" placeholder="Search" value="{{old('userName')}}">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                </form>
                </div>

          </div>

          @if (count($users) != 0)
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
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('user#detail',$user->id)}}">
                          <button class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-circle-info"></i></button>
                        </a>
                        <a href="{{route('user#changeRole',$user->id)}}" title="Change user role to user">
                          <button class="btn btn-sm bg-primary text-white"><i class="fa-solid fa-user-minus"></i></button>
                        </a>
                        <a href="{{route('user#delete',$user->id)}}">
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
                    <p class="m-3 text-red" >There is no User till now!</p>
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
