<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerContactPerson;

class CustomerContactPersonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customer,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'no_ktp' => 'nullable|string|max:20',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:255|unique:customer_contact_person,email',
            'address' => 'nullable|string|max:255',
        ]);

        $contactPerson = new CustomerContactPerson($request->all());
        $contactPerson->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Contact person created successfully.',
            'data' => $contactPerson,
                ]);
    }
}
