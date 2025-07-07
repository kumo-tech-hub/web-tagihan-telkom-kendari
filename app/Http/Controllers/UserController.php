<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('users',compact('users'));
    }

    public function create(){
        return view('users.form');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user',
            
        ]);

        User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.form',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);

        // Cek apakah password diisi, jika ya hash dulu
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            // Hapus password agar tidak ikut diupdate
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

}
