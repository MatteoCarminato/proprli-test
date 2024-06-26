<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks with optional filtering.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $tasks = Task::query();

        if ($request->has('status')) {
            $tasks->where('status', $request->status);
        }

        if ($request->has('user_id')) {
            $tasks->where('user_id', $request->user_id);
        }

        if ($request->has('building_id')) {
            $tasks->where('construction_id', $request->building_id);
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $tasks->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $tasks->with('comments');

        $tasks = $tasks->get();

        return response()->json(['data' => $tasks]);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param StoreTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();

        $task = Task::create($validatedData);

        return response()->json(['data' => $task], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
