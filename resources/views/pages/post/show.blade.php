
@extends('layouts.app')

@section('content')

<div class="container">
  
  <div class="card">
    <div class="card-header">
      {{$post->title}}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>{!! $post->body !!}</p>
        <footer class="blockquote-footer">Published by: <cite title="Source Title">{{$post->user->name}}</cite></footer>
      </blockquote>
    </div>
    @can('Update posts')
    <a href="{{route('posts.edit', $post)}}" class="btn btn-warning">Edit</a>
    @endcan
  </div>
</div>

@auth
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-12">
      <hr>
      <div class="bg-light contain text-secondary shadow-sm p-3 mb-5 bg-white rounded">
        <div class="small">Add Comments:</div>
        <div class="comments-body">
          <form method="POST" action="{{ route('comments.store') }}" class="authentication-form editor" data-toggle="validator">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body">{{ old('body')}}</textarea>
                  <br>
                  <button class="btn btn-primary btn-block">Send</button>
              </div>
          </form>
          </div>
        </div>
    </div>
  </div>
</div>
@else
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-12">
      <hr>
      <div class="bg-light contain text-secondary shadow-sm p-3 mb-5 bg-white rounded">
        <div class="comments-body">
            <a href="{{route('login')}}"class="btn btn-outline-success btn-sm">
              Login
            </a>
            ó
            <a href="{{route('register')}}" class="btn btn-outline-danger btn-sm">
              Sing up
            </a>
          </div>
        </div>
    </div>
  </div>
</div>
@endauth
@forelse ($post->comments as $comment)
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-12">
      <hr>
      <div class="bg-light contain text-secondary shadow-sm p-3 mb-5 bg-white rounded">
        <div class="clearfix comment-head">
          <div class="small float-right">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div class="comment-body container">
          <div class="row comment-head">
            <div class="small col-sm-2">
              <div class="small text-center">
                {{ $comment->user->name }}
              </div>
            </div>
            <div class="col-sm-10 p-2 rounded border border-light">
              {!! $comment->body !!}
            </div>
            <div class="clearfix comment-footer">
              @can('Create comment')
              <div class="float-right">
                  @can('Update comment')
                    <a href="{{ route('comments.edit', $comment) }}" class="text-right btn btn-warning">Edit </a>
                  @endcan
                  @can('Delete posts')
                  ó 
                  <form method="POST" action="{{ route('comments.destroy', $comment) }}" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('¿Are you sure to delete the comment?')">Remove</button>
                  </form>
                  @endcan
              </div>
              @endcan
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@empty
  <div class="container">
        <div class="row">
          <div class="col-lg-9 col-12">
            <hr>
            <div class="bg-light contain text-secondary shadow-sm p-3 mb-5 bg-white rounded">
              <div class="clearfix comment-head">
                This new has not comments
              </div>
            </div>
          </div>
        </div>
      </div>
@endforelse
 

@endsection