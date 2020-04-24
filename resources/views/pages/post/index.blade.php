


@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      Post Listing
    </div>
    <div class="card-body">
      <h5 class="card-title">List of all post</h5>
      <p class="card-text"></p>
        @can('Create posts')
        <a class="btn btn-primary text-right" href="{{route('posts.create')}}" >
          New post
        </a>
        @endcan
    </div>
  </div>
  <div class="my-5"></div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Descripcion</th>
        <th scope="col">User</th>
        <th scope="col">Show</th>
        @can('Update posts')
        <th scope="col">Delete</th>
        @endcan
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)

      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->excerpt}}</td>
        <td>{{$post->user->name}}</td>
        <td> <a href="{{route('posts.view', $post->url)}}" class="btn btn-success">Show</a> </td>
       @can('Delete posts')
        <td>
          <form method="POST" action="{{route('posts.destroy',$post)}}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
              <i class="pr-3 fa fa-times"></i>Remove
            </button>
          </form>
        </td>
        @endcan
      </tr>
      @endforeach
      
    </tbody>
  </table>
  {{ $posts->links() }}

</div>
@endsection