@extends('layouts.app')
@section('content')
    


        <form action="{{ route('login') }}" method="post">
            @csrf
            @if (session('status'))
                
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                  </div>
                  
            @endif 
            
                <div class="mb-3">
                  <h4 for="exampleInputEmail1" class="form-label">Email address</h4>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <h4 for="exampleInputPassword1" class="form-label">Password</h4>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remeber me</label>
                </div>
                <button type="submit" class="btn btn-lg btn-dark">Login</button>
        </form>

        

@endsection