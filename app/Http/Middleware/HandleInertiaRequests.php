<?php

namespace App\Http\Middleware;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        if (!$request->user()) {
            return parent::share($request);
        }

        return array_merge(parent::share($request), [
            'user' => fn () => $request->user()->only('id', 'name', 'email', 'avatar_url'),
            'all_tasks_count' => fn () => Task::count(),
            'user_tasks_count' => fn () => $request->user()->tasks()->count(),
            'categories' => fn () => CategoryResource::collection(Category::withCount('tasks')->orderBy('tasks_count', 'desc')->get()),
        ]);
    }
}
