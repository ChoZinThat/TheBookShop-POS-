@extends('layouts.master')

@section('form-heading')
    <h3 class="">Login</h3>
@endsection

@section('content')
<div class="login-form">
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label">Email Address</label>
            <input class="form-control " type="email" name="email" placeholder="Email">
            @error('email')
            <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Password</label>
            <input class="form-control " type="password" name="password" placeholder="Password">
            @error('password')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>

        <button class="btn btn-success mb-3" type="submit">Login</button>

    </form>
    <div class="register-link mb-3">
        <p>
            Don't you have account?
            <a href="{{route('auth#registerPage')}}">Sign Up Here</a>
        </p>
    </div>
</div>
@endsection
