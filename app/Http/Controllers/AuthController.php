<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $user = \App\Models\User::where('email', $request->email)->first();

        // Cek apakah user ditemukan
        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            // Simpan session user
            session([
                'user_id'    => $user->id,
                'user_name'  => $user->name,
                'user_email' => $user->email,
            ]);

            // Redirect ke dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Login berhasil! Selamat datang, ' . $user->name);
        }

        // Jika gagal login
        return back()->withInput($request->only('email'))->with('error', 'Email atau password salah!');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
