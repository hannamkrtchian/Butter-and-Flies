<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Auth;

class ItemController extends Controller
{
    // login om nieuw item te maken of editen
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'clothes', 'shoes', 'accessories', 'show']]);
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
        // als gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user()->is_admin) {
            abort(403);
        }
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

    // edit pagina
    public function edit($id){
        $item = Item::findOrFail($id);

        // als gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user()->is_admin) {
            abort(403);
        }

        return view('items.edit', compact('item'));
    }

    // updaten data in database
    public function update($id, Request $request){
        $item = Item::findOrFail($id);

        // als gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'title'             => 'required',
            'description'       => 'required',
            'price'             => 'required',
            'picture'           => 'required',
            'category'          => 'required',
        ]);

        $item->title = $validated['title'];
        $item->description = $validated['description'];
        $item->price = $validated['price'];
        $item->picture = $validated['picture'];
        $item->category = $validated['category'];
        $item->save();

        return redirect()->route('index');
    }

    // elk item apart bekijken
    public function show($id){
        $item = Item::findOrFail($id);
        $otheritems = Item::where('category', '=', $item->category)->where('id', '!=', $id)->latest()->get();

        return view('items.show', compact('item', 'otheritems'));
    }

    public function destroy($id){
        if(!Auth::User()->is_admin) {
            abort(403);
        }

        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('index')->with('status', 'Item deleted');
    }
}
