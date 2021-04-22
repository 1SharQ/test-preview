@extends('layouts.app')
@section('content')

<h1>Posts</h1>
@guest
<div class="alert alert-warning" role="alert">Please sign in so you can post here.</div>
@endguest

@auth
<form  action="{{ route('posts') }}" method="POST">
    @csrf
   
        
    
    <div class="mb-3">
        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="post here!" name="body" value="{{ old('body') }}" rows="3"></textarea>
    </div>
    @error('body')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
      </div>
    @enderror
    <button type="submit" class="btn btn-lg btn-dark">Post</button>
</form>
    @endauth
<div class="mt-5">
    @if ($posts->count())
    <div class="my-4">
        <ul class="list-group">
            @foreach ($posts as $post)
            <x-post :post="$post"/>

            @endforeach
        </ul>
    </div>
    <div class="center">
        {{ $posts->links() }}
    </div>


    @else
    <h4>there are no posts</h4>
    @endif
</div>


@endsection