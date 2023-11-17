<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        if (!$employees) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get all data employees",
                "data" => $employees
            ];

            return response()->json($data, 200);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            "name" => "required|string",
            "gender" => "required|in:pria,wanita",
            "phone" => "required|numeric",
            "address" => "required|string",
            "email" => "required|email|unique:employees,email",
            "departement_id" => "required|exists:departement,id",
            "position_id" => "required|exists:position,id",
            "status" => "required|in:active,inactive,terminated",
            "hired_on" => "required|date"
        ]);

        $employees = Employees::create($input);

        $data = [
            "message" => "Employees created",
            "data" => $employees
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $employees = Employees::find($id);

        if (!$employees) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data employees by id",
                "data" => $employees
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $employee = Employees::find($id);

        if (!$employee) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
           $request->validate([
                "name" => "string",
                "gender" => "in:pria,wanita",
                "phone" => "numeric",
                "address" => "string",
                "email" => "email|unique:employees,email,{$employee->id}",
                "departement_id" => "exists:departement,id",
                "position_id" => "exists:position,id",
                "status" => "in:active,inactive,terminated",
                "hired_on" => "date"
            ]);

            $input = [
                "name" => $request->name ?? $employee->name,
                "gender" => $request->gender ?? $employee->gender,
                "phone" => $request->phone ?? $employee->phone,
                "address" => $request->address ?? $employee->address,
                "email" => $request->email ?? $employee->email,
                "departement_id" => $request->departement_id ?? $employee->departement_id,
                "position_id" => $request->position_id ?? $employee->position_id,
                "status" => $request->status ?? $employee->status,
                "hired_on" => $request->hired_on ?? $employee->hired_on
            ];

            $employee->update($input);

            $data = [
                "message" => "Employees updated",
                "data" => $employee
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $employee = Employees::find($id);

        if (!$employee) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $employee->delete();

            $data = [
                "message" => "Employees deleted",
                "data" => $employee
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * filter by name the specified resource from storage.
     */
    public function search(String $name)
    {
        $employees = Employees::where('name', 'like', "%{$name}%")->get();

        if (!$employees) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data employees by name",
                "data" => $employees
            ];

            return response()->json($data, 200);
        }
    }


    /**
     * filter by active status the specified resource from storage.
     */
    public function active()
    {
        $employees = Employees::where('status', 'active')->get();

        if (!$employees) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data employees by status active",
                "data" => $employees
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * filter by inactive status the specified resource from storage.
     */
    public function inactive()
    {
        $employees = Employees::where('status', 'inactive')->get();

        if (!$employees) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data employees by status inactive",
                "data" => $employees
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * filter by terminated status the specified resource from storage.
     */
    public function terminated()
    {
        $employees = Employees::where('status', 'terminated')->get();

        if (!$employees) {
            $data = [
                "message" => "Data employees not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data employees by status terminated",
                "data" => $employees
            ];

            return response()->json($data, 200);
        }
    }
}
