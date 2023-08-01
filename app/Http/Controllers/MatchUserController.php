<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MatchUser;
use Illuminate\Http\Request;

class MatchUserController extends Controller
{
    //
    public function index() {

        $friends = MatchUser::where('user_id', auth()->user()->id)->get();

        $friend_id = [];
        $count = 0;
        foreach($friends as $user) {
            $friend_id[$count] = $user->friend_id;
            $friend[$count] = User::find($user->friend_id);
            $count++;
        }

        // dd($friend);



        return view('friends', [
            'friends' => $friend
        ]);
    }
}
