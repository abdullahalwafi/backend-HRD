<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $position = Position::all();

        if (!$position) {
            $data = [
                "message" => "Data position not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get all data position",
                "data" => $position
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
            'name' => "required|string|unique:position,name",
            'description' => "required|string"
        ]);

        $position = Position::create($input);

        $data = [
            "message" => "Position created",
            "data" => $position
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $position = Position::find($id);

        if (!$position) {
            $data = [
                "message" => "Data position not found",
                "data" => []
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                "message" => "Get data position by id",
                "data" => $position
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
        $position = Position::find($id);
        if (!$position) {
            $data = [
                "message" => "Data position not found",
                "data" => []
            ];
            return response()->json($data, 404);
        }

        $request->validate([
            'name' => "string|unique:position,name,{$position->id}",
            'description' => "string"
        ]);
        $input = [
            'name' => $request->name ?? $position->name,
            'description' => $request->description ?? $position->description
        ];

        $position->update($input);

        $data = [
            "message" => "Position updated",
            "data" => $position
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $position = Position::find($id);
        if (!$position) {
            $data = [
                "message" => "Data position not found",
                "data" => []
            ];
            return response()->json($data, 404);
        }

        $position->delete();

        $data = [
            "message" => "Position deleted",
            "data" => $position
        ];

        return response()->json($data, 200);
    }
}
