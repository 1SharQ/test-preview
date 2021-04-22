@extends('layouts.app')
@section('content')
    


        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <h4 for="exampleInputEmail1" class="form-label">Name</h4>
                <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <h4 for="exampleInputEmail1" class="form-label">Username</h4>
                <input value="{{ old('username') }}" type="text" name="username" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <h4 for="exampleInputEmail1" class="form-label">Email address</h4>
                <input value="{{ old('email') }}" type="email" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <h4 for="exampleInputPassword1" class="form-label">Password</h4>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>

              <div class="mb-3">
                <h4 for="exampleInputPassword1" class="form-label">Confirm Password</h4>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
              </div>
            @error('password')
            <div class="mb-3">
                <div class="alert alert-danger" role="alert"> please make sure your passwords match</div>
            </div>
            @enderror
            <button type="submit" class="btn-lg btn btn-dark">Register</button>

        </form>

@endsection