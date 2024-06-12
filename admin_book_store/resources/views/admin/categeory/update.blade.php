@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-4 mt-2 ms-4">
        <form action="{{route('category#update')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <label for="title" class="">Title</label>

                    <input type="hidden" name="id" value="{{$category->category_id}}">

                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter category title" value="{{$category->category_name}}">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="description" class="mt-3">Description</label>
                    <textarea name="description" id="" cols="30" rows="7" class="form-control" placeholder="Enter category description">{{$category->category_description}}</textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <input type="submit" value="Save" class="btn btn-dark mt-2 offset-9">
                </div>
            </div>
        </form>
    </div>
    <div class=" col-7 mt-2" >
        @if (Session::has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible" role="alert">
                    {{Session::get('deleteSuccess')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category Table</h3>
                    <div class="card-tools">
                        <form action="{{route('category#search')}}" method="post">
                            @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="categorySearch" class="form-control float-right" placeholder="Search" value="{{old('categorySearch')}}">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                    </div>

              </div>
              @if (count($categoryList) != 0)
              <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categoryList as $c)
                <tr>
                    <td>{{$c->category_id}}</td>
                    <td>{{$c->category_name}}</td>
                    <td>{{$c->category_description}}</td>
                    <td>
                      <a href="{{route('category#editPage',$c->category_id)}}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                      </a>
                      <a href="{{route('category#delete',$c->category_id)}}">
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
                    <p class="m-3 text-red">There is no category that you are searching for!</p>
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
