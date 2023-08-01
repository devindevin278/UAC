<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //
    public function index() {
        $avatars = Avatar::all();

        return view('store', [
            'avatars' => $avatars
        ]);
    }

    public function buyavatar(Request $request) {
        $user = User::find(auth()->user()->id);
        if($request->avatar_price > $user->wallet) {
            return redirect('/store')->with('fail', "Not enough money");
        }

    }
}
