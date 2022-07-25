<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function FrmRegister()
    {
        return view('App.Register.register');
    }

    public function UserList()
    {
        return view('App.SettingBackEnd.Users.main');
    }
    public function UserAdd()
    {
        return view('App.SettingBackEnd.Users.add');
    }


    public function RegisterUser(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->userright = $request->userright;
        $newUser->status = "1";
        $register = $newUser->save();

        if (!$register) {
            return response()->json(["result" => false]);
        } else {
            return response()->json(["result" => true]);
        }
    }

    public function LoginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect()->intended('dashboard');
            if (!Auth::check()) {
                return response()->json(["result" => false]);
            } else {
                return response()->json(["result" => true]);
            }
        }
    }

    public function LogoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/app/login');
    }
}
