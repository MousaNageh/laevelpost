<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware(["guest"]);
    //     $this->middleware(["guest"])->only("index");
    // }
    public function index(){
        return view("auth.login");
    }
    public function login(Request $request){
        $request->validate([
            "email"=>["required","email"],
            "password"=>["required"]
        ]);

        $user =Auth::attempt($request->only("email","password"),$request->remember);
        if($user)
            return redirect()->route("dashboard");
        else
            return back()->with("status","not valid Cardintials");
    }

}