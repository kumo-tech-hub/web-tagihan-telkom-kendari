<?php

namespace App\Http\Controllers;

use App\Models\AccountManager;
use Illuminate\Http\Request;
use App\Models\AccountManager;

class AccountManagerController extends Controller
{

    public function index()
    {
        $managers = AccountManager::latest()->paginate(10);
        return view('managers', compact('managers')); // Mengarah ke managers.blade.php
    }

    public function create()
    {
        return view('managers.form'); // Akan kita buat di langkah 5
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:account_managers,email',
            'phone_number' => 'nullable|string|max:20',
            'status' => 'required|boolean',
        ]);

        AccountManager::create($validatedData);

        return redirect()->route('managers.index')->with('success', 'Account Manager added successfully.');
    }

    public function edit($id)
    {
        $manager = AccountManager::findOrFail($id);
        return view('managers.form', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $manager = AccountManager::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:account_managers,email,' . $manager->id,
            'phone_number' => 'nullable|string|max:20',
            'status' => 'required|boolean',
        ]);

        $manager->update($validatedData);

        return redirect()->route('managers.index')->with('success', 'Account Manager updated successfully.');
    }


    public function destroy($id)
    {
        $manager = AccountManager::findOrFail($id);
        $manager->delete();

        return redirect()->route('managers.index')->with('success', 'Account Manager deleted successfully.');
    }

}
