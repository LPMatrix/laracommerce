<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Session;
use Illuminate\Http\Request;


class CartController extends Controller
{
 

   public function __construct()
   {
       $this->middleware('auth');
   }

 
  public function getAddToCart(Request $request, $id)
  {
  	$product = Products::find($id);
  	$oldCart = Session::has('cart') ? Session::get('cart') : null;
  	$cart = new Cart($oldCart);
  	$cart->add($product, $product->id);

  	$request->session()->put('cart', $cart);
  		//dd($request->session()->get('cart'));
  	$notify = array('alert' => 'success', 'message' => 'Item has been added to cart' );
  	return $notify;
  }

  public function getReduceByOne($id)
  {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

       if (count($cart->items) > 0) {
         Session::put('cart', $cart);
      }else{
           Session::forget('cart');
      } 


      return redirect()->route('product.shoppingCart');
  }

  public function getRemoveItem($id)
  {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

       if (count($cart->items) > 0) {
         Session::put('cart', $cart);
      }else{
           Session::forget('cart');
      } 

      $notify = array('alert' => 'error', 'message' => 'Item has been removed from cart' );
      return  $notify;
  }

  public function getCart()
  {
  	if (!Session::has('cart')) {
  		return view('cart', ['products' => null]);
  	}

     

  	$oldCart = Session::get('cart');
  	$cart = new Cart($oldCart);
      
  	return view('cart', [
  		'products' => $cart->items, 
  		'totalPrice' => $cart->totalPrice

  	]);

      
  }

}
