@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="offset-1 col-8 mt-2 ">

        <form action="{{route('writer#update')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body row ">
                    <input type="hidden" name="id" value="{{$writer->writer_id}}">
                    <div class="col-2">
                        <label for="name" class="">Author Name</label>
                    </div>

                    <div class="col-7">
                        <input type="text" name="name" id="name" class="form-control " placeholder="Enter author name" value="{{old('name',$writer->writer_name)}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-2">
                        <input type="submit" value="Update" class="btn btn-dark" >
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

          @if (count($writerList) != 0)
              <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($writerList as $wList)
                <tr>
                    <td>{{$wList->writer_id}}</td>
                    <td>{{$wList->writer_name}}</td>
                    <td>
                      <a href="">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                      </a>
                      <a href="{{route('writer#delete',$wList->writer_id)}}">
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
                    <p class="m-3 text-red" >There is no author!</p>
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
