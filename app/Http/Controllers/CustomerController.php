<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerContactPerson;
class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(10);
        return view('customers', compact('customers'));
    }
    public function create(){
        return view('customers.form');
    }
    public function store(Request $request){
        $request->validate([
            'company_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'email' => 'required|email|max:255|unique:customer,email',
            'type' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }
    public function edit($id){
        $customer = Customer::findOrFail($id);
        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }
        $contactPeople = CustomerContactPerson::where('customer_id', $id)->get();
    
        return view('customers.form', compact('customer', 'contactPeople'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'company_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'email' => 'required|email|max:255|unique:customer,email,' . $id,
            'type' => 'required|string|max:50',
            'status' => 'required|boolean',
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
}

