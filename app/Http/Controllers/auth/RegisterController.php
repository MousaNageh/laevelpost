<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("auth.register");
    }
    public function store(Request $request){
        // dd($request->get("email"));
        // dd($request->get("username"));
        // dd($request->email);
        // dd($request->only("email","password"));
        $this->validate($request,[
            "name"=>"required|string|max:255",
            "email"=>"required|email|unique:users,email",
            "username"=>"required|string|max:30|unique:users,username",
            "password"=>"required|min:8|confirmed"
        ]);
        User::create([
            "username"=>$request->username,
            "email"=>$request->email,
            "name"=>$request->name,
            "password"=>Hash::make($request->password)
        ]);
        // auth()->attempt(["email"=>$request->email,"password"=>$request->password]);
        // Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        Auth::attempt($request->only("email","password"));
        return redirect()->route("dashboard");
    }

}