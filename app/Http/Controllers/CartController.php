<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    // login om cart te bekijken
    public function __construct(){
        $this->middleware('auth');
    }

    public function createCart(Request $request) {
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->save();
    }

    // items opslaan in cart
    public function addItemToCart($item_id) {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        $cart->item_ids = Item::findorfail($item_id);
        $cart->save();

        return redirect()->route('cart');
    }

    // items tonen in cart
    public function cart(){
        if(Cart::whereIn('user_id', [Auth::user()->id])) {
            $items_in_cart = Cart::where('user_id', '=', Auth::user()->id)->get('item_ids');
            return view ('cart', compact('items_in_cart'));
        }
        else {
            createCart();
            return view ('cart', compact('items_in_cart'));
        }
    }
}
