<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // login om cart te bekijken ??
    public function __construct(){
        $this->middleware('auth');
    }

    // items tonen in cart
    public function cart(){

        // $items = Item::where(user-id = user-id)->get();
        // return view ('cart', compact('items'));
    }
}
