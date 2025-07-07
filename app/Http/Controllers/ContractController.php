<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Company;
use App\Models\AccountManager;
use App\Models\Produk;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    // Display list of contracts
    public function listContracts()
    {
        $contracts = Contract::with(['company', 'accountManager', 'produk'])
            ->latest()
            ->paginate(10);
        
        return view('contract', compact('contracts'));
    }

    // Show create form
    public function create()
    {
        $companies = Company::all();
        $accountManagers = AccountManager::all();
        $products = Produk::all();
        
        return view('contracts.create', compact('companies', 'accountManagers', 'products'));
    }

    // Store new contract
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'account_manager_id' => 'required|exists:account_managers,id',
            'produk_id' => 'required|exists:produk,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'paid_status' => 'required|in:Paid,Unpaid'
        ]);

        Contract::create($request->all());
        
        return redirect()->route('contracts.list')
            ->with('success', 'Contract created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $companies = Company::all();
        $accountManagers = AccountManager::all();
        $products = Produk::all();
        
        return view('contracts.edit', compact('contract', 'companies', 'accountManagers', 'products'));
    }

    // Update contract
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'account_manager_id' => 'required|exists:account_managers,id',
            'produk_id' => 'required|exists:produk,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'paid_status' => 'required|in:Paid,Unpaid'
        ]);

        $contract = Contract::findOrFail($id);
        $contract->update($request->all());
        
        return redirect()->route('contracts.list')
            ->with('success', 'Contract updated successfully!');
    }

    // Delete contract
    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        
        return redirect()->route('contracts.list')
            ->with('success', 'Contract deleted successfully!');
    }
}