
@extends('layouts.app')

@section('content')
<div class="container">
  <form method="post" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label for="titleform">Title</label>
      <input type="text" class="form-control" id="titleform" placeholder="title post" name="title" required="">
    </div>
    <div class="form-group">
      <label for="excerpform">Excerpt</label>
      <input type="text" class="form-control" id="excerpform" placeholder="title post" name="excerpt" required="">
    </div>

    <div class="form-group">
      <label for="stateselect">State:</label>
      <select class="form-control" id="stateselect" name="status" required="">
        <option value="published">Published</option>
        <option value="draft">Draft</option>
      </select>
    </div>
    <div class="form-group">
      <label for="bodyform">Body</label>
      <textarea class="form-control" id="bodyform" rows="3" name="body" required=""></textarea>
    </div>
    <button class="btn btn-block btn-success">Save post</button>
  </form>
</div>

@endsection