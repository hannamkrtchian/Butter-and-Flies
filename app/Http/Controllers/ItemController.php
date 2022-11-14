<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Auth;

class ItemController extends Controller
{
    public function index(){

        $items = Item::all();
        return view ('home', compact('items'));
    }

    public function create(){
        return view('items.create');
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'title'             => 'required',
            'description'       => 'required',
            'price'             => 'required',
            'picture'           => 'required',
            'category'          => 'required',
        ]);

        $item = new Item;
        $item->title = $validated['title'];
        $item->description = $validated['description'];
        $item->price = $validated['price'];
        $item->picture = $validated['picture'];
        $item->category = $validated['category'];
        $item->save();

        return redirect()->route('index');
    }
}
