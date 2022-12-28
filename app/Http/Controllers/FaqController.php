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
}
