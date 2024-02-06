<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function login(){
        // User::create([
        //     'name' => 'Admin Manager',
        //     'email' => 'letrongnhan2502@gmail.com',
        //     'password' => bcrypt(123123)
        // ]);  
        return view('admin.login');
    }

    public function check_login(Request $req){
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $data = $req->only('email', 'password');
        $check = auth()->attempt($data);

        if($check){
            return redirect()->route('admin.index')->with('success', 'Welcome Back');
        }
        return redirect()->back()->with('fail', 'Your email or password does not match');        
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('fail', 'Logged out');
    }
}
