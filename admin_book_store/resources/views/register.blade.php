@extends('layouts.master')

@section('form-heading')
    <h3>Register</h3>
@endsection

@section('content')
<div class="login-form">
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label">Username</label>
            <input class="form-control @error('name')is-invalid  @enderror " type="text" name="name" placeholder="Username">
            @error('name')
            <span class="invalid-feedback">
                {{$message}}
              </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <labe class="form-label"l>Email Address</labe>
            <input class="form-control @error('email')is-invalid   @enderror " type="email" name="email" placeholder="Email">
            @error('email')
            <span class="invalid-feedback">
                {{$message}}
              </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror " type="password" name="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback">
                {{$message}}
              </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Password</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror " type="password" name="password_confirmation" placeholder="Confirm Password">
            @error('password_confirmation')
            <span class="invalid-feedback">
                {{$message}}
              </span>
            @enderror
        </div>

        <button class="btn btn-primary mb-3" type="submit">register</button>

    </form>
    <div class="register-link">
        <p>
            Already have account?
            <a href="{{route('auth#loginPage')}}">Sign In</a>
        </p>
    </div>
</div>
@endsection
