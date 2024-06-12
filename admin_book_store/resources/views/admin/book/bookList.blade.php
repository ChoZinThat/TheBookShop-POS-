@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="row  mt-2 ms-4">
        <div class="col-2 offset-9">
            <a href="{{route('book#createPage')}}">
                <button class="btn btn-outline-success ms-3">Add new book</button>
            </a>
        </div>
    </div>


    <div class=" col-11 mx-3 mt-2" >
        @if (Session::has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                    {{Session::get('deleteSuccess')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        @endif

        @if (Session::has('updateSuccess'))
        <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('updateSuccess')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Book Table</h3>
                <div class="card-tools">

                    <form action="{{route('book#search')}}" method="post">
                        @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="bookSearch" class="form-control float-right" placeholder="Search" value="{{old('bookSearch')}}">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                </form>
                </div>

          </div>

          @if (count($bookList) != 0)
                <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr >
                  <th >ID</th>
                  <th >Name</th>
                  <th >Description</th>
                  <th >Image</th>
                  <th >Category</th>
                  <th >Author</th>
                  <th >Released Date</th>
                  <th >Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bookList as $bList)
                <tr >
                    <td >{{$bList->book_id}}</td>
                    <td >{{$bList->name}}</td>
                    <td  >{{$bList->book_description}}</td>
                    <td  >
                        <image style="width:50px;height:50px" @if ($bList->image == null)
                            src="{{asset('Image/defaultBookCover.png')}}"
                        @else
                            src="{{asset('storage/'.$bList->image)}}"
                        @endif
                        class="img-thumbnail"></image>
                    </td>
                    <td  >{{$bList->category_id}}</td>
                    <td  >{{$bList->author_id}}</td>
                    <td  >{{$bList->released_date}}</td>
                    <td  >{{$bList->price}}</td>
                    <td  >
                      <a href="{{route('book#editPage',$bList->book_id)}}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                      </a>
                      <a href="{{route('book#delete',$bList->book_id)}}">
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
                    <p class="m-3 text-red">There is no book that you are searching for!</p>
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
