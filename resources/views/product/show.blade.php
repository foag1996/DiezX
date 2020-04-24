
@extends('layouts.app')

@section('content')

<div class="form-row">
	<div class="form-group col-md-6">
		<label for="description">Description</label>
		<input type="Text" class="form-control" id="description" name="description" value="{{$product->description}}">
	</div>
	<div class="form-group col-md-6">
		<label for="value">Value</label>
		<input type="Number" class="form-control" id="value" name="value" value="{{$product->value}}">
	</div>
</div>    
<div class="form-group">
	<label for="user_id">User</label>
	<select class="custom-select" id="user_id" name="user_id" >
		<option value="">{{$product->users->name}}</option>
	</select>
</div>
<div class="row">
	<div class="col">
		  <a href="{{route('product.edit',['product' => $product])}}">Edit</a> 
	</div>
	
</div>
 

@endsection