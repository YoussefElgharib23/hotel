<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the login form to the user.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Attempt login user.
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            throw ValidationException::withMessages([
                'email' => trans('invalid.credentials')
            ]);
        }


        return redirect('');
    }

    /**
     * Logout the current user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerate();

        return redirect('');
    }
}
