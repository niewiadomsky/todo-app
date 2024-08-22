<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'assignedUser')->get();

        return Inertia::render('index', [
            'tasks' => TaskResource::collection($tasks)
        ]);
    }
}
