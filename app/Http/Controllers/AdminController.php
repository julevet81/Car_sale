<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $admins = Admin::all();
        return view('dashboard.admin.index', compact('admins', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.admin.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:admins,user_id|exists:users,id',
        ]);

        $admin = new Admin();
        $admin->user_id = $validatedData['user_id'];
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $adminData = [
            'id' => $admin->id,
            'user_id' => $admin->user_id,
            'Name' => $admin->user->name,
            'Email' => $admin->user->email,
            'Phone' => $admin->user->phone,
            'Address' => $admin->user->address,
            'Image URL' => $admin->user->image_url,
            'Status' => $admin->user->status,
            'created_at' => $admin->created_at,
            'updated_at' => $admin->updated_at,
        ];
        return view('dashboard.admin.show', compact('adminData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $users = User::all();
        return view('dashboard.admin.edit', compact('admin', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:admins,user_id,' . $admin->id . '|exists:users,id',
        ]);

        $admin->user_id = $validatedData['user_id'];
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('dashboard.admin')->with('success', 'Admin deleted successfully.');
    }
}
