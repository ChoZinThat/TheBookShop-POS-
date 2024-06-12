@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-8 offset-3 mt-5">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <legend class="text-center">Password Change</legend>

              </div>
              <div class="card-body">
                <div class="tab-content">
                    @if(session('updateSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ session('updateSuccess') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    @endif

                    @if(session('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p>{{ session('fail') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    @endif
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" action="{{route('admin#changePassword')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                      <div class="form-group row">
                        <label for="inputName" class="offset-1 col-sm-11 col-form-label">Old Password</label>
                        <div class="offset-1 col-sm-10">
                          <input type="password" name="adminOldPassword" class="form-control"
                          id="inputOldPassword" placeholder="Enter your Old Password..." >
                          @error('adminOldPassword')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="offset-1 col-sm-11 col-form-label">New Password</label>
                        <div class="offset-1 col-sm-10">
                          <input type="password" name="adminNewPassword" class="form-control"
                          id="inputNewPassword" placeholder="Enter your New Password..." >
                          @error('adminNewPassword')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="offset-1 col-sm-11 col-form-label">Confirm Password</label>
                        <div class="offset-1 col-sm-10">
                          <input type="password" name="adminConfirmPassword" class="form-control"
                          id="inputConfirmPassword" placeholder="Enter your Confirm Password..." >
                          @error('adminConfirmPassword')
                            <span>{{$message}}</span>
                          @enderror
                        </div>
                      </div>



                      <div class="form-group row">
                        <div class="offset-sm-8 col-sm-4">
                          <button type="submit" class="btn bg-dark text-white">Update</button>
                        </div>
                      </div>
                    </form>

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
