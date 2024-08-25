<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignedUserResource;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'assignedUser')->get();
        $defaultUsers = User::limit(10)->orderBy('updated_at')->get();

        return Inertia::render('Index', [
            'tasks' => TaskResource::collection($tasks),
            'defaultUsers' => AssignedUserResource::collection($defaultUsers)
        ]);
    }

    }
}
