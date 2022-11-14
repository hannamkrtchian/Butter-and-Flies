<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Auth;

class ItemController extends Controller
{
    // login om nieuw item te maken
    public function __construct(){
        $this->middleware('auth');
    }
    
    // alle items tonen in homepage
    public function index(){

        $items = Item::latest()->get();
        return view ('home', compact('items'));
    }

    public function clothes(){

        $items = Item::where('category', '=', 'clothes')->get();
        return view ('items.clothes', compact('items'));
    }

    public function shoes(){

        $items = Item::where('category', '=', 'shoes')->get();
        return view ('items.shoes', compact('items'));
    }

    public function accessories(){

        $items = Item::where('category', '=', 'accessories')->get();
        return view ('items.accessories', compact('items'));
    }

    // naar create pagina
    public function create(){
        return view('items.create');
    }

    // wat gecreëerd is storen in db
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
