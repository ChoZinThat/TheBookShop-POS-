@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-2 mt-3">
        <a href="{{route('book#list')}}">
            <span><i class="fa-solid fa-arrow-left"></i></span>
        </a>
        <form action="{{route('book#update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$book->book_id}}">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <img @if($book->image != null)
                                        src="{{asset('storage/'.$book->image)}}"
                                     @else
                                        src="{{asset('Image/defaultBookCover.png')}}"
                                     @endif
                                alt="{{$book->name}}"
                                class="col-10 offset-1 img-thumbnail">
                            </div>

                            <div class="row">
                                <label for="image" class="mt-3">Photo</label>
                                <input type="file" name="bookImage" class="form-control">
                                @error('bookImage')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <label for="bookName" class="">Book Name</label>
                            <input type="text" name="bookName" id="bookName" class="form-control" placeholder="Enter Book Name..." value="{{old('bookName',$book->name)}}">
                            @error('bookName')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <label for="" class="mt-3">Author</label>
                            <select name="writer" class="form-control" >
                                <option value="0">Choose an option...</option>
                                @foreach ($writers as $w)
                                    <option value="{{$w->writer_id}}" @if($w->writer_id == $book->author_id) selected @endif>{{$w->writer_name}}</option>
                                @endforeach
                            </select>
                            @error('writer')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <label for="" class="mt-3">Category</label>
                            <select name="category" class="form-control" >
                                <option value="0">Choose an option...</option>
                                @foreach ($categories as $c)
                                    <option value="{{$c->category_id}}"@if($c->category_id == $book->category_id) selected @endif >{{$c->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <label for="description" class="mt-3">Description</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Enter description...">{{old('description',$book->book_description)}}</textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="Price" class="mt-3">Book Price</label>
                    <input type="number" name="bookPrice" class="form-control" value="{{old('bookPrice',$book->price)}}">
                    @error('bookPrice')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="releaseDate" class="mt-3">Released Date</label>
                    <input type="date" name="releaseDate" class="form-control" value="{{$book->released_date}}">
                    @error('releaseDate')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <input type="submit" value="Update" class="btn btn-dark mt-2 offset-9">
                </div>
            </div>
        </form>
    </div>

</div>



@endsection
