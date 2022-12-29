<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Faq;
use Auth;

class FaqController extends Controller
{
    // show page
    public function show(){
        $categories = Category::latest()->get();
        $faqs = Faq::latest()->get();
        return view('faq.show', compact('categories', 'faqs'));
    }

    // naar create faq pagina
    public function create($category_id){
        $category = Category::findOrFail($category_id);

        // als gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }
        
        return view('faq.create', compact('category'));
    }

    // category storen in db
    public function storeCat(Request $request){
        
        $validated = $request->validate([
            'naam'             => 'required',
        ]);

        $category = new Category;
        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('faq.edit');
    }

    // faq storen in db
    public function storeFaq($id, Request $request){
        
        $validated = $request->validate([
            'question'           => 'required',
            'answer'             => 'required',
        ]);

        $faq = new Faq;
        $faq->category_id = $id;
        $faq->question = $validated['question'];
        $faq->answer = $validated['answer'];
        $faq->save();

        return redirect()->route('faq.edit');
    }

    public function edit(){
        $categories = Category::latest()->get();
        $faqs = Faq::latest()->get();

        // als gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        return view('faq.edit', compact('categories', 'faqs'));
    }

    // updaten data in database
    public function update($id, Request $request){
        $faq = Faq::findOrFail($id);

        // als andere gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'question'              => 'required',
            'answer'                => 'required',
        ]);

        $faq->question = $validated['question'];
        $faq->answer = $validated['answer'];
        $faq->save();

        return redirect()->route('faq.edit');
    }

    // delete category
    public function destroyCat($id){
        if(!Auth::User() || !Auth::User()->is_admin) {
            abort(403);
        }

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('faq.edit')->with('status', 'Category deleted');
    }

    // delete faq
    public function destroyFaq($id){
        if(!Auth::User() || !Auth::User()->is_admin) {
            abort(403);
        }

        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('faq.edit')->with('status', 'Question deleted');
    }
}
