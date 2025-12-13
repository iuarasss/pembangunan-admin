<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua user
     */
    public function index(Request $request)
    {
        $query = \App\Models\User::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->role) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(10)->appends($request->query());

        return view('pages.user.index', compact('users'));
    }
    /**
     * Menampilkan form tambah user
     */
    public function create()
    {
        $roles = ['admin', 'guest'];
        return view('pages.user.create');
    }

    /**
     * Menyimpan user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'role'     => 'required|in:admin,guest',
            'password' => 'required|confirmed|min:6',
            'photo'    => 'nullable|image|max:2048',
        ]);

        // SIMPAN USER KE VARIABEL
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // SIMPAN FOTO
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('user-photo', 'public');
            $user->update([
                'photo' => $photo
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }


    /**
     * Menampilkan form edit user
     */
    public function edit(User $user)
    {
        $roles = ['admin', 'guest'];
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Memperbarui data user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:admin,guest',
            'password' => 'nullable|confirmed|min:6',
            'photo'    => 'nullable|image|max:2048',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('user-photo', 'public');
            $data['photo'] = $photo;
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }


    /**
     * Menghapus user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
