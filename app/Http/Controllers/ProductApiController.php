<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $employee_list = Employee::latest()->get();

        return response()->json($employee_list);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:400|string',
            'email' => 'required|max:300',
            'phone' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'department' => 'required',
            'position' => 'required',
            'salary' => 'required'
        ]);

        $employee_data = new Employee();
        $employee_data->name = $request->name;
        $employee_data->email = $request->email;
        $employee_data->phone = $request->phone;
        $employee_data->birthdate = $request->birthdate;
        $employee_data->address = $request->address;
        $employee_data->department = $request->department;
        $employee_data->position = $request->position;
        $employee_data->salary = $request->salary;
        $employee_data->save();

        return response()->json([
            'message' => 'Employee created successfully',
            'employee' => $employee_data
        ], 201);
    }


    public function edit($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }
    }
}
