<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();
        return view('dashboard.employee.index', compact('employees', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.employee.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:employees,user_id|exists:users,id',
        ]);

        $employee = new Employee();
        $employee->user_id = $validatedData['user_id'];
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employeeData = [
            'id' => $employee->id,
            'user_id' => $employee->user_id,
            'Name' => $employee->user->name,
            'Email' => $employee->user->email,
            'Phone' => $employee->user->phone,
            'Address' => $employee->user->address,
            'Image URL' => $employee->user->image_url,
            'Status' => $employee->user->status,
            'created_at' => $employee->created_at,
            'updated_at' => $employee->updated_at,
        ];
        return view('dashboard.employee.show', compact('employeeData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $users = User::all();
        return view('dashboard.employee.edit', compact('employee', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|unique:employees,user_id,' . $employee->id . '|exists:users,id',
        ]);

        $employee->user_id = $validatedData['user_id'];
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
