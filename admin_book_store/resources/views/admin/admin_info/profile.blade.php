@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-8 offset-3 mt-5">
          <div class="col-md-9">

            <div class="card">

              <div class="card-header p-2">
                <a href="{{route('admin#listPage')}}" class="text-dark">
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
                    <form class="form-horizontal" action="{{route('admin#updateInfo')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <img class="col-3 offset-4 img-thumbnail shadow-sm"
                        @if ($admin->photo == null)
                            src="{{asset('Image/adminNull.jpg')}}"
                        @else
                            src="{{asset('storage/'.$admin->photo)}}"
                        @endif alt={{$admin->photo}}>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="image" placeholder="Name" @if ($admin->id != Auth::user()->id) disabled  @endif>
                              @error('image')
                                <span>{{$message}}</span>
                              @enderror
                            </div>
                        </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="adminName" class="form-control"
                          id="inputName" placeholder="Enter your name" value="{{old('adminName',$admin->name)}}"
                          @if ($admin->id != Auth::user()->id) disabled  @endif>
                          @error('adminName')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="adminEmail" class="form-control"
                          id="inputEmail" placeholder="Enter your Email" value="{{old('adminEmail',$admin->email)}}"
                          @if ($admin->id != Auth::user()->id) disabled  @endif>
                          @error('adminEmail')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text"  name="adminPhone" class="form-control"
                          id="inputName" placeholder="Enter your phone" value="{{old('adminPhone',$admin->phone)}}"
                          @if ($admin->id != Auth::user()->id) disabled  @endif>
                          @error('adminPhone')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea  id="inputAddress" cols="30" rows="5" name="adminAddress"
                          placeholder="Enter your address" class="form-control"
                          @if ($admin->id != Auth::user()->id) disabled  @endif>{{old('adminAddress',$admin->address)}}</textarea>
                          @error('adminAddress')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      @if($admin->id == Auth::user()->id)
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-dark text-white">Submit</button>
                        </div>
                      </div>

                    </form>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{route('admin#changePWpage')}}">
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
