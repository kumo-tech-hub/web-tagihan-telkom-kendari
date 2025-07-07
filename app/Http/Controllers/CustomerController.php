<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contract; 
use App\Models\AccountManager; 
use App\Models\Produk; 
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        
        return view('customer', compact('companies'));
    }

    public function create()
    {
        return view('customer.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_type' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:companies,email',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_phone' => 'nullable|string',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Company::create($validatedData);

        return redirect()->route('customer.index')->with('success', 'Company added successfully.');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('customer.form', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_type' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:companies,email,' . $company->id,
            'contact_person_name' => 'required|string|max:255',
            'contact_person_phone' => 'nullable|string',
            'address' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $company->update($validatedData);

        return redirect()->route('customer.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('customer.index')->with('success', 'Company deleted successfully.');
    }
}