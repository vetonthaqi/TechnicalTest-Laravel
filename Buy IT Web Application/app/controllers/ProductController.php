<?php

class ProductController extends BaseController
{
	public function index()
	{
		$products = ITProduct::all();
		return View::make('product.index')->with('products', $products);
	}

	public function storeProduct()
	{
		$validator = Validator::make(Input::all(), array(
			'product_name' => 'required|unique:buy_products',
			'description' => 'required',
			'quantity' => 'required',
			'buying_price' => 'required',
			'selling_price' => 'required'
		));

		if($validator->fails())
		{
			return Redirect::route('product-home')->withInput()->withErrors($validator)->with('modal', '#product_form');
		}
		else
		{
			$product = new ITProduct;
			$product->product_name = Input::get('product_name');
			$product->description = Input::get('description');
			$product->quantity = Input::get('quantity');
			$product->buying_price = Input::get('buying_price');
			$product->selling_price = Input::get('selling_price');
			$product->author_id = Auth::user()->id;

			if($product->save())
			{
				return Redirect::route('product-home')->with('success', 'The product was created.');
			}
			else
			{
				return Redirect::route('product-home')->with('fail', 'An error occured while saving the new product.');
			}
		}
	}

	public function deleteProduct($id)
	{
		$product = ITProduct::find($id);
		if($product == null)
		{
			return Redirect::route('product-home')->with('fail', 'That product doesn\'t exists.');
		}

		$delProduct = $product->delete();

		if($delProduct)
		{
			return Redirect::route('product-home')->with('success', 'The product was deleted.');
		}
		else
		{
			return Redirect::route('product-home')->with('fail', 'An error occured while deleting the product.');
		}
	}

	// public function edit($id)
	// {
	// 	$product = ITProduct::find($id);
	// 	return View::make('product.edit')->with('product', $product);
	// }

	// public function update($id)
	// {
	// 	$rules = array(
	// 		'product_name' => 'required|unique:buy_products',
	// 		'description' => 'required',
	// 		'quantity' => 'required',
	// 		'buying_price' => 'required',
	// 		'selling_price' => 'required'
	// 	);

	// 	$validator = Validator::make(Input::all(), $rules);

	// 	if($validator->fails())
	// 	{
	// 		return Redirect::to('product/' . $id . '/edit')
	// 			->withErrors($validator)
	// 			->withInput(Input::all())
	// 	}
	// 	else
	// 	{
	// 		$product = ITProduct::find($id);
	// 		$product->product_name = Input::get('product_name');
	// 		$product->description = Input::get('description');
	// 		$product->quantity = Input::get('quantity');
	// 		$product->buying_price = Input::get('buying_price');
	// 		$product->selling_price = Input::get('selling_price');	
	// 		$product->save();

	// 		Session::flash('message', 'Successfully updated product!');
	// 		return Redirect::to('product');
	// 	}
	// }
}