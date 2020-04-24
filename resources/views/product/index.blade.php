


@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Value</th>
      <th scope="col">User</th>
      <th scope="col">Show</th>
      
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $product)

    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->description}}</td>
      <td>{{$product->value}}</td>
      <td>{{$product->users->name}}</td>
      <td> <a href="{{route('product.show',['product' => $product])}}">Show</a> </td>
     
      <td> <a href="{{route('product.destroy',['product' => $product])}}">Destroy</a> </td>
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection