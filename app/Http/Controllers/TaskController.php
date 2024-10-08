<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\AssignedUserResource;
use App\Http\Resources\TaskResource;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index(?Category $category = null)
    {
        $tasks = Task::with('category', 'assignedUser')
            ->when($category, fn ($query) => $query->where('category_id', $category->id))
            ->latest()
            ->get();

        $defaultUsers = User::orderBy('updated_at')->get();

        return Inertia::render('Index', [
            'tasks' => TaskResource::collection($tasks),
            'defaultUsers' => AssignedUserResource::collection($defaultUsers),
            'defaultCategoryId' => $category ? $category->id : null,
        ]);
    }

    public function getUserTasks(Request $request)
    {
        $tasks = $request->user()
            ->tasks()
            ->with('category', 'assignedUser')
            ->latest()
            ->get();

        $defaultUsers = User::orderBy('updated_at')->get();

        return Inertia::render('Index', [
            'tasks' => TaskResource::collection($tasks),
            'defaultUsers' => AssignedUserResource::collection($defaultUsers),
        ]);
    }

    public function store(StoreTaskRequest $request)
    {

        Task::create([
            ...$request->validated(),
            'created_by' => $request->user()->id,
        ]);

        return back();
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }
}
