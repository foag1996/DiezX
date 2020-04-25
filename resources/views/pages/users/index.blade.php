


@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      User Listing
    </div>
    <div class="card-body">
      <h5 class="card-title">List of all user</h5>
    </div>
  </div>
  <div class="my-5"></div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)

      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  {{ $users->links() }}

</div>
@endsection