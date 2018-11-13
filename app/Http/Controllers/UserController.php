<?php

namespace App\Http\Controllers;

use App\User;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $reports = Report::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $report_status = ['Belum diverifikasi', 'Terverifikasi', 'Selesai'];
        $colors = ['red', 'blue', 'green'];

        $userData = [
            'name' => Auth::user()->name,
            'nik' => Auth::user()->nik,
            'points' => Auth::user()->points,
        ];

        // return view('home')->with('userData', $userData)->with('reports', $reports);
        return view('home')->with(compact('userData', 'reports', 'report_status', 'colors'));
    }

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
            // if(Auth::user()->is_admin){
            //     return redirect('/admin');
            // }
            // else{
            //     return redirect('/');
            // }
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function showRegistrationPlain(){
        return view('register-plain');
    }

    public function showLoginPlain(){
        return view('login-plain');
    }
}
