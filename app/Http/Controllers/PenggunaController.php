<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class PenggunaController extends BaseController
{
    public function pengguna(Request $request)
    {
        $search = $request->query('search');

        $users = User::when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                             ->orWhere('email', 'LIKE', "%{$search}%")
                             ->orWhere('jabatan', 'LIKE', "%{$search}%")
                             ->orWhere('type', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.pengguna', compact('users'));
    }

    public function tambahPengguna()
    {
        return view('admin.tambahPengguna');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jabatan' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required|integer|between:0,2',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'jabatan' => $validatedData['jabatan'],
            'password' => bcrypt($validatedData['password']),
            'type' => $validatedData['type'],
        ]);

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    public function editPengguna($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editPengguna', compact('user'));
    }
    public function updatePengguna(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'jabatan' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'type' => 'required|integer|between:0,2',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->jabatan = $validatedData['jabatan'];
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->type = $validatedData['type'];
        $user->save();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
    public function hapusPengguna($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }

    

}
