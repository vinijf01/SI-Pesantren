<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class LoginController extends Controller
{
    public function show()
    {
        // Jika routenya parent-login, maka arah ke view auth.parents.index
        if (Route::currentRouteName() === 'parent-login') {
            return view('auth.parent.login', [
                'title' => 'Login'
            ]);
        }

        // Jika routenya login, maka arah ke view auth.index
        return view('auth.login', [
            "title" => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        // Jika routenya parent-login, maka validasi id_santri dan password
        if ($request->route()->getName() === 'parent-login-request') {
            $credential = $request->validate([
                'id_santri_fk' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($credential)) {
                $request->session()->regenerate();
                // return redirect()->intended('/dashboard/parent');
                return Auth::user()->is_permission == 2 ? redirect()->intended('/dashboard/parent') : redirect()->intended('/dashboard/admin');
            }

            return back()->with('inputError', 'Login Failed');
        } else {
            $credential = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($credential)) {
                $request->session()->regenerate();
                return Auth::user()->is_permission == 1 ? redirect()->intended('/dashboard/admin') : redirect()->intended('/dashboard/parent');
            }

            return back()->with('inputError', 'Login Failed');
        }
    }
}
