<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required',
            'nik' => 'required',
            'password' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'id' => rand(100000, 999999),
            'name' => request('name'),
            'nik' => request('nik'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        auth()->login($user);

        return redirect()->to('/');
    }
}
