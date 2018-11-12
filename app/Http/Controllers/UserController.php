<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
        public function showRegistration(){
        return view('register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'nik' => 'unique:users',
            'email' => 'unique:users'
        ]);

        $name = $request['name'];
        $nik = $request['nik'];
        $email = $request['email'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->id = rand(100000, 999999);
        $user->name = $name;
        $user->nik = $nik;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        if(Auth::attempt(['nik' => $request['nik'], 'password' => $request['password']])){
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
    }
}
