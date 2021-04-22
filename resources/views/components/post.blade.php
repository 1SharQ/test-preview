@props(['post'=>$post])

<li class="list-group-item">
    <a class="user" href="{{ route('user.posts',$post->user) }}">{{ $post->user->name }}</a>
    
    <p class="lh-sm mt-4">{{ $post->body }}</p>
    @auth                     
        <div class="btn-group">
            @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes',$post) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-like btn-outline-primary">like</button>
            </form> 
            @else   
            <form action="{{ route('posts.likes',$post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-like btn-outline-secondary">Unlike</button>
            </form> 
            @endif
        </div>
    @endauth 
    <p class="mt-2">{{ $post->like->count() }} {{ Str::plural('like', $post->like->count()) }}</p>
    <p class="text-end">{{ $post->created_at->diffForHumans() }}</p> 
    @can('delete',$post)
    <form action="{{ route('posts.destroy',$post) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">
          Delete
        </button>
    </form>
    @endcan
    
</li>