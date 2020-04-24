
@extends('layouts.app')

@section('content')
<form method="put" action="{{route('product.update',['product' => $product])}}">
	@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Description</label>
      <input type="Text" class="form-control" id="description" name="description" value="{{$product->description}}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="value">Value</label>
      <input type="Number" class="form-control" id="value" name="value" value="{{$product->value}}" required>
    </div>
  </div>    
  <div class="form-group">
   
    	<label for="user_id">User</label>
      <select class="custom-select" id="user_id" name="user_id" required>
        <option selected disabled value="">Choose...</option>
        @foreach($data as $key)
        	@if($product->users->id == $key->id)
        <option value="{{$key->id}}" selected>{{$key->name}}</option>
        	@else
        	<option value="{{$key->id}}" >{{$key->name}}</option>
        	@endif
        @endforeach
        
      </select>
    	
   
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection