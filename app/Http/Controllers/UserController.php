<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {

        if(request('search')) {

        }

        $users = User::whereNot('id', auth()->user()->id)->get();

        return view('home', [
            'users' => $users
        ]);
    }

    public function topup(Request $request) {
        // dd($request);
        $user = User::find(auth()->user()->id);
        $data['wallet'] = $user->wallet + $request->topup;

        $user->update($data);

        return redirect('/store')->with('success', 'Top up success');
    }
}
