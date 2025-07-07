<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['company'])->paginate(10);
        return view('users',compact('users'));
    }

    public function create(){
        $companies = Company::all();
        return view('users.form',compact('companies'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'company_id'=>'nullable|exists:companies,id',
            'role' => 'required|in:admin,user',
            
        ]);
        // dd($validatedData);
        User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $companies = Company::all();
        return view('users.form',compact('user','companies'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'company_id'=>'nullable|exists:companies,id',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

}
