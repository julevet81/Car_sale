<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        $customers = Customer::all();
        return view('customer.index', compact('customers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('customer.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:customers,user_id|exists:users,id',
        ]);

        $customer = new Customer();
        $customer->user_id = $validatedData['user_id'];
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customerData = [
            'id' => $customer->id,
            'user_id' => $customer->user_id,
            'Name' => $customer->user->name,
            'Email' => $customer->user->email,
            'Phone' => $customer->user->phone,
            'Address' => $customer->user->address,
            'Image URL' => $customer->user->image_url,
            'Status' => $customer->user->status,
            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at,
        ];
        return view('customer.show', compact('customerData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $users = User::all();
        return view('customer.edit', compact('customer', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:customers,user_id,'.$customer->id.'|exists:users,id',
        ]);

        $customer->user_id = $validatedData['user_id'];
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}
