<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountManager;

class AccountManagerController extends Controller
{
    public function index(){
        $managers = AccountManager::paginate(10);
        return view('managers', compact('managers'));
    }

    public function create(){
        return view('account_manager.form');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:account_manager,email',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        AccountManager::create($request->all());

        return redirect()->route('managers.index')->with('success', 'Account Manager created successfully.');
    }

    public function edit($id){
        $manager = AccountManager::findOrFail($id);
        return view('account_manager.form', compact('manager'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:account_manager,email,'.$id,
            'phone_number' => 'required|string|max:20',
            'status' => 'required|boolean',
        ]);

        $manager = AccountManager::findOrFail($id);
        $manager->update($request->all());

        return redirect()->route('managers.index')->with('success', 'Account Manager updated successfully.');
    }

    public function destroy($id){
        $manager = AccountManager::findOrFail($id);
        $manager->delete();

        return redirect()->route('managers.index')->with('success', 'Account Manager deleted successfully.');
    }
}
