<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FaqController extends Controller
{
    // show page
    public function show(){
        $categories = Category::latest()->get();
        return view('faq.show', compact('categories'));
    }

    // show questions
    public function showQuestions($category_id){
        $category = Category::findOrFail($category_id);
        $questions = Faq::where('category_id', '=', $category_id);

        return view('faq.show', compact('category', 'questions'));
    }
}
