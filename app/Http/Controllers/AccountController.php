<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class AccountController extends Controller
{
    public function login(){
        return view('account.login');
    }

    public function check_login(){

    }

    public function register(){
        return view('account.register');
    }

    public function check_register(Request $req){
        $req->validate([
            'name' => 'required|min:6|max100',
            'email' => 'required|email|min:6|max100|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ],[
            'name.required' => 'họ tên không được để trống',
            'name.min' =>'họ tên tối thiểu phải 6 kí tự'
        ]
    );
    $data = $req->only('name','email');
    $data['password'] = bcrypt($req->passwword);

        if( $acc = Customer::create($data)){
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            dd ('ok');
        }
            dd('no ok');
    }

    public function change_password(){
        return view('account.change_password');
    }

    public function check_change_password(){

    }

    public function forgot_password(){
        return view('account.forgot_password');
    }

    public function check_forgot_password(){

    }

    public function profile(){
        return view('account.profile');
    }

    public function check_profile(){

    }

    public function reset_password(){
        return view('account.reset_password');
    }

    public function check_reset_password(){

    }

}
