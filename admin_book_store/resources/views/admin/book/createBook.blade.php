@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-2 mt-3">
        <a href="{{route('book#list')}}">
            <span><i class="fa-solid fa-arrow-left"></i></span>
        </a>

        <form action="{{route('book#createData')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-body">
                    <label for="bookName" class="">Book Name</label>

                    <input type="text" name="bookName" id="bookName" class="form-control" placeholder="Enter Book Name..." value="{{old('bookName')}}">
                    @error('bookName')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="" class="mt-3">Author</label>
                    <select name="writer" class="form-control" >
                        <option value="0">Choose an option...</option>
                        @foreach ($writers as $w)
                            <option value="{{$w->writer_id}}">{{$w->writer_name}}</option>
                        @endforeach
                    </select>
                    @error('writer')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="" class="mt-3">Category</label>
                    <select name="category" class="form-control" >
                        <option value="0">Choose an option...</option>
                        @foreach ($categories as $c)
                            <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="description" class="mt-3">Description</label>
                    <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Enter description...">{{old('description')}}</textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="image" class="mt-3">Photo</label>
                    <input type="file" name="bookImage" class="form-control">
                    @error('bookImage')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="Price" class="mt-3">Book Price</label>
                    <input type="number" name="bookPrice" class="form-control">
                    @error('bookPrice')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="releaseDate" class="mt-3">Released Date</label>
                    <input type="date" name="releaseDate" class="form-control">
                    @error('releaseDate')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <input type="submit" value="Save" class="btn btn-dark mt-2 offset-9">
                </div>
            </div>
        </form>
    </div>

</div>



@endsection
