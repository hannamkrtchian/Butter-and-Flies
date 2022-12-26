<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    // show profiles
    public function profile($id){
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));
    }

    // edit your own profile
    public function edit($id){
        $user = User::findOrFail($id);

        // als andere gebruiker link intypt krijgt die abort 403
        if(Auth::user()->id != $id) {
            abort(403);
        }

        return view('users.edit', compact('user'));
    }

    // updaten data in database
    public function update($id, Request $request){
        $user = User::findOrFail($id);

        // als andere gebruiker zelf link intypt krijgt die abort 403
        if(Auth::user()->id != $id) {
            abort(403);
        }

        $validated = $request->validate([
            'name'              => 'required',
            'biography'         => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'avatar'            => 'required',
            'birthday'          => 'required',
        ]);

        $user->name = $validated['name'];
        $user->biography = $validated['biography'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->avatar = $validated['avatar'];
        $user->birthday = $validated['birthday'];
        $user->save();

        return redirect()->route('profile', $user->id);
    }
}
