<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if (session()->has('user_id')) {
            return redirect()->route('login');
        }
        return $this->showLoginForm();
    }

    public function showLoginForm()
    {
        return view('pages.auth.login-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')
                ->with('success', 'Login berhasil! Selamat datang, ' . Auth::user()->name);
        }

        return back()->withInput($request->only('email'))
            ->with('error', 'Email atau password salah!');
    }

   public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}
