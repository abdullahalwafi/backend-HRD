<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departement = Departement::all();

        if (!$departement) {
            $data = [
                "message" => "Data departement not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get all data departement",
                "data" => $departement
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => "required|string|unique:departement,name",
            'description' => "required|string"
        ]);

        $departement = Departement::create($input);

        $data = [
            "message" => "Departement created",
            "data" => $departement
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $departement = Departement::find($id);

        if (!$departement) {
            $data = [
                "message" => "Data departement not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data departement by id",
                "data" => $departement
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            $data = [
                "message" => "Data departement not found",
                "data" => []
            ];
            return response()->json($data, 404);
        }

        $input = $request->validate([
            'name' => "required|string|unique:departement,name,{$departement->id}" ,
            'description' => "required|string"
        ]);

        $departement->update($input);

        $data = [
            "message" => "Departement updated",
            "data" => $departement
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            $data = [
                "message" => "Data departement not found",
                "data" => []
            ];
            return response()->json($data, 404);
        }

        $departement->delete();

        $data = [
            "message" => "Departement deleted",
            "data" => $departement
        ];

        return response()->json($data, 200);
    }
}
