<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Auth;

class ContactController extends Controller
{
    // form page tonen
    public function form(){
        return view('contact.form');
    }

    // show questions from contact page
    public function show(){
        $questions = Contact::latest()->get();

        // als gebruiker zelf link intypt krijgt die abort 403
        if(!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        return view('contact.view', compact('questions'));
    }

    // contact question storen in db
    public function store(Request $request){
        
        $validated = $request->validate([
            'email'             => 'required',
            'question'          => 'required',
        ]);

        $contact = new Contact;
        $contact->email = $validated['email'];
        $contact->question = $validated['question'];
        $contact->save();

        return redirect()->route('contact.form');
    }

    public function destroy($id){
        if(!Auth::User() || !Auth::User()->is_admin) {
            abort(403);
        }

        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.show')->with('status', 'Question deleted');
    }
}
