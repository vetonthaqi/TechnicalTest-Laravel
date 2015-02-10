@extends('layouts.master')

@section('head')
	@parent
	<title>Products</title>
@stop

@section('content')

<h1>Edit {{ $product->product_name }}</h1>

<form id="target_form" method="put" action=" # ">
	<div class="form-group {{($errors->has('product_name')) ? ' has-error' : ''}} ">
		<label for="product_name">Product Name</label>
		<input type="text" id="product_name" name="product_name" class="form-control">
		@if($errors->has('product_name'))
			<p> {{ $errors->first('product_name') }} </p>
		@endif
	</div>
	<div class="form-group {{($errors->has('description')) ? ' has-error' : ''}}">
		<label for="description">Description</label>
		<input type="text" id="description" name="description" class="form-control">
		@if($errors->has('description'))
			<p> {{ $errors->first('description') }} </p>
		@endif
	</div>
	<div class="form-group {{($errors->has('quantity')) ? ' has-error' : ''}}">
		<label for="quantity">Quantity</label>
		<input type="text" id="quantity" name="quantity" class="form-control">
		@if($errors->has('quantity'))
			<p> {{ $errors->first('quantity') }} </p>
		@endif
	</div>
	<div class="form-group {{($errors->has('buying_price')) ? ' has-error' : ''}}">
		<label for="buying_price">Buying Price</label>
		<input type="text" id="buying_price" name="buying_price" class="form-control">
		@if($errors->has('buying_price'))
			<p> {{ $errors->first('buying_price') }} </p>
		@endif
	</div>
	<div class="form-group {{($errors->has('selling_price')) ? ' has-error' : ''}}">
		<label for="selling_price">Selling Price</label>
		<input type="text" id="selling_price" name="selling_price" class="form-control">
		@if($errors->has('selling_price'))
			<p> {{ $errors->first('selling_price') }} </p>
		@endif
	</div>
	{{Form::token()}}
</form>


@stop