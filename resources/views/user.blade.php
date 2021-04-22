@extends('layouts.app')
@section('content')
    <h1>{{ $user->name }}</h1>
    <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
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