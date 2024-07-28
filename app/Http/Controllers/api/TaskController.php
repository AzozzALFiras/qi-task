<?php

namespace App\Http\Controllers\api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    // Display a listing of tasks for a specific project
    public function index($projectId)
    {
        $tasks = Task::where('project_id', $projectId)->get();
        return response()->json($tasks);
    }

    // Store a newly created task in storage
    public function store(Request $request, $projectId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'is_completed' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $task = Task::create(array_merge(
            $request->all(),
            ['project_id' => $projectId]
        ));

        return response()->json($task, 201);
    }

    // Display the specified task
    public function show($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->find($taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    // Update the specified task in storage
    public function update(Request $request, $projectId, $taskId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date',
            'is_completed' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $task = Task::where('project_id', $projectId)->find($taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->all());

        return response()->json($task);
    }

    // Remove the specified task from storage
    public function destroy($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->find($taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }

    // Example of a custom query method
    public function getTasksEndingAfter($projectId, $date)
    {
        $count = Task::getTasksEndingAfter($projectId, $date);
        return response()->json(['count' => $count]);
    }
}