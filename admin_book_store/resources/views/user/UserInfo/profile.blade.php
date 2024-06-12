@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-8 offset-3 mt-5">
          <div class="col-md-9">

            <div class="card">

              <div class="card-header p-2">
                <a href="{{route('user#listPage')}}" class="text-dark">
                    <span><i class="fa-solid fa-left-long"></i></span>
                </a>
                <legend class="text-center">Admin Profile</legend>

              </div>
              <div class="card-body">
                <div class="tab-content">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ session('success') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    @endif
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" action="{{route('user#updateInfo')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="row mb-3">
                            <img class="col-3 offset-4 img-thumbnail shadow-sm"
                        @if ($user->photo == null)
                            src="{{asset('Image/userNull.jpg')}}"
                        @else
                            src="{{asset('storage/'.$user->photo)}}"
                        @endif alt={{$user->photo}}>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="image" placeholder="Name" @if ($user->id != Auth::user()->id) disabled  @endif>
                              @error('image')
                                <span>{{$message}}</span>
                              @enderror
                            </div>
                        </div> --}}

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="userName" class="form-control"
                          id="inputName" placeholder="Enter your name" value="{{old('userName',$user->name)}}"
                          @if ($user->id != Auth::user()->id) disabled  @endif>
                          @error('userName')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="userEmail" class="form-control"
                          id="inputEmail" placeholder="Enter your Email" value="{{old('userEmail',$user->email)}}"
                          @if ($user->id != Auth::user()->id) disabled  @endif>
                          @error('userEmail')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text"  name="userPhone" class="form-control"
                          id="inputName" placeholder="Enter your phone" value="{{old('userPhone',$user->phone)}}"
                          @if ($user->id != Auth::user()->id) disabled  @endif>
                          @error('userPhone')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea  id="inputAddress" cols="30" rows="5" name="userAddress"
                          placeholder="Enter your address" class="form-control"
                          @if ($user->id != Auth::user()->id) disabled  @endif>{{old('userAddress',$user->address)}}</textarea>
                          @error('userAddress')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      @if($user->id == Auth::user()->id)
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-dark text-white">Submit</button>
                        </div>
                      </div>

                    </form>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{route('user#changePWpage')}}">
                          <button class="btn btn-outline-dark">Change Password</button>
                        </a>
                        </div>
                    </div>
                     @endif


                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
