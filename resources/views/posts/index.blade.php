@extends("layout.app")

@section("title")
posts
@endsection

@section("content")
<div class="container">
    <div class="card text-left col-md-6 offset-md-3 my-1 shadow-lg p-3 mb-5 bg-white rounded">
      <div class="card-body">
        <h4 class="card-title text-info">Posts</h4>
        <div class="card-text">
            <div class="card border-info p-2">
                <h5 class="card-title text-info">Create Post</h5>
                <div class="card-body">
                    <form action="{{ route("post") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="post" id="" placeholder="Type Your post" class="form-control @error("post")
                                border-danger
                            @enderror">{{ old("post", "") }}</textarea>
                        </div>
                        @error("post")
                            <div>
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-info text-white">Submit</button>
                    </form>
                </div>
            </div>
            @if ($posts->count())
                @foreach ($posts as $post )
                <div class="card my-1 shadow-lg p-3  bg-white rounded" >
                    <div class="card-body">
                      <div class="card-title d-flex justify-content-between">
                          <h5>
                              {{ $post->user->username }}
                          </h5>
                          @can("delete",$post)
                          <form  action="{{ route('deletepost', [$post->id]) }}" method="POST">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-danger">
                                 delete
                              </button>
                          </form>
                          @endcan





                    </div>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->diffForHumans() }}</h6>
                      <p class="card-text">{{ $post->post }}.</p>
                      <div >
                            <span class="badge badge-info text-white">{{ $post->like->count() }}
                            </span>
                            @if (!$post->likedBy(auth()->user()->id))
                            <form action="{{ route('like',[$post->id]) }}" method="POST">
                            @csrf
                            <button type="submit" oncanplay="prevent"  class="btn btn-info text-white">like </button>
                            </form>

                            @endif
                      </div>

                        @if ($post->likedBy(auth()->user()->id))
                        <form action="{{ route('unlike',[$post->id]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" oncanplay="prevent"  class="btn btn-danger">Unlike </button>
                        </form>
                        @endif

                    </div>
                  </div>
                @endforeach
            @endif

        </div>


        {{ $posts->links('vendor.pagination.custom') }}










      </div>
    </div>
</div>
@endsection
