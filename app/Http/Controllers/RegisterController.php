<?php

namespace App\Http\Controllers;

use App\Models\Temp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RegisterController extends Controller
{
    //
    public function index($locale = 'en') {
        if(! in_array($locale, ['en', 'id'])) {
            $locale = 'en';
        }

        App::setLocale($locale);

        $rand = mt_rand(100000, 125000);

        return view('register', [
            'rand' => $rand
        ]);
    }

    public function temp(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'gender' => 'required',
            'password' => 'required',
            'photo' => 'required|image|file',
            'linkedin' => 'required',
            'phone' => 'required',
            'fee' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        // if($validatedData['photo']) {
        $validatedData['photo'] = $request->file('photo')->store('profile-pic');
        // }
        // dd($validatedData);
        Temp::create($validatedData);
        session()->put('user_data', $validatedData);

        return redirect('/payment')->with('success', 'Registration Successful! Make Payment Now');

    }

    public function store(Request $request) {

        if($request->money < $request->fee) {
            return redirect('/payment')->with('fail', 'Not enough money');
        }

        $temp = Temp::where('email', $request->temp_email)->first();


        // dd($temp[0]);

        $data['name'] = $temp->name;
        $data['email'] = $temp->email;
        $data['password'] = $temp->password;
        $data['gender'] = $temp->gender;
        $data['linkedin'] = $temp->linkedin;
        $data['phone'] = $temp->phone;
        $data['photo'] = $temp->photo;
        $data['wallet'] = $request->money - $request->fee;


        // $validatedData['password'] = bcrypt($validatedData['password']);

        // if($validatedData['photo']) {
        // $validatedData['photo'] = $request->file('photo')->store('profile-pic');
        // }
        // dd($validatedData);
        // Temp::create($validatedData);

        // $validatedData['fee'] = $request->fee;

        // session()->put('user_data', $validatedData);
        User::create($data);

        return redirect('/en/login')->with('success', 'Registration successful! Login Now!');
    }

    public function payment() {
        return view('payment');
    }

    public function makePayment(Request $request) {

        return redirect('/login');
    }


}
