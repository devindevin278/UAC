<?php

namespace App\Http\Controllers;

use App\Models\MatchUser;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //
    public function store(Request $request) {
        $wish = new Wishlist;

        $wish['target_id'] = $request->target_id;
        $wish['user_id'] = auth()->user()->id;

        $wish->save();

        return redirect('/home')->with('success', 'You added ' . $request->target_name);
    }

    public function notification() {

        $requesters = Wishlist::where('target_id', auth()->user()->id)->get();

        // dd($requesters);

        return view('notification', [
            'requesters' => $requesters
        ]);
    }

    public function addmatch(Request $request) {
        $data['user_id'] = $request->target_id;
        $data['friend_id'] = $request->user_id;

        MatchUser::create($data);

        $data2['user_id'] = $request->user_id;
        $data2['friend_id'] = $request->target_id;

        MatchUser::create($data2);

        $delete = Wishlist::where('user_id', $request->target_id)->where('target_id', $request->user_id)->get();
        Wishlist::destroy($delete);

        return redirect('/friends')->with('success', 'You added');
    }
}
