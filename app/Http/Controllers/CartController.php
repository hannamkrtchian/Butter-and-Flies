<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use Auth;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    // login om cart te bekijken
    public function __construct(){
        $this->middleware('auth');
    }

    public function create() {
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->save();
    }

    // items opslaan in cart
    public function addItemToCart($id) {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        $cart->item_ids = $cart->item_ids->concat([$id]);
        $cart->save();

        return redirect()->route('cart');
    }

    // items tonen in cart
    public function cart($id){

        // enkel ingelogde gebruikers & NIET admins (admin heeft geen cart)
        if(!Auth::user() || Auth::user()->is_admin) {
            abort(403);
        }

        $cart = Cart::where('user_id', '=', $id)->first();
        $item_ids = str_split($cart->item_ids);
        $items = Item::whereIn('id', $item_ids)->get();
        
        return view ('cart', compact('items'));
    }

    // delete item from cart
    public function update($item_id){
        if(!Auth::User()) {
            abort(403);
        }

        $cart = Cart::where('user_id', '=', Auth::User()->id)->first();
        $array1 = str_split($cart->item_ids);
        $array2 = Arr::pull($array1, $item_id);
        // error
        $cart->item_ids = $array2;
        $cart->save();

        return redirect()->route('cart', Auth::User()->id)->with('status', 'Item deleted');
    }
}
