<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Faq;

class FaqController extends Controller
{
    // show page
    public function show(){
        $categories = Category::latest()->get();
        $faqs = Faq::latest()->get();
        return view('faq.show', compact('categories', 'faqs'));
    }

    // show faq
    public function showFaq($category_id){
        $faqs = Faq::where('category_id', '=', $category_id);

        return view('faq.show', compact('faqs'));
    }
}
