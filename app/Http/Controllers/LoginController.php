<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $result = DB::table("users")
                    ->where("username", $request->get('username'))
                    ->first();
        if (!$result) {
            return redirect("login")->withErrors('Login details are not valid');
        }
        if (!Hash::check($request->get('password'), $result->password)) {
            return redirect("login")->withErrors('Login details are not valid');
        }
        $loginData = [
            "user_type_id" => $result->user_type_id,
            "user_type" => $result->user_type,
            "id" => $result->id,
            "username" => $result->username,
            "name" => $result->name,
            "mobile_no" => $result->mobile_no,
            "email" => $result->email,
            "address" => $result->address,
        ];
        $session = session();
        $session->put("userData", $loginData);
        //dd($session->get("loginData"));
        return redirect()->intended('Dashboard')->withSuccess('Signed in');
    }

    /* public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        //$credentials = $request->only('username', 'password');
        $credentials = ['username'=>$request->get('username'), 'password'=>$request->get('password'), 'status'=>1];
        if (Auth::guard('webadmin')->attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
        return redirect("login")->withErrors('Login details are not valid');
    } */

    public function logout()
    {
        Session::flush();  
        return Redirect('login');
    }
}
