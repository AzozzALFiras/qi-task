<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\projects\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Fetch all projects for the authenticated user
        $projects = Auth::user()->projects()->with('tasks')->get();
        return response()->json($projects);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $project = Auth::user()->projects()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($project, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $project = Auth::user()->projects()->with('tasks')->find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        return response()->json($project);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $project = Auth::user()->projects()->find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->update($request->all());

        return response()->json($project);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $project = Auth::user()->projects()->find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }
}