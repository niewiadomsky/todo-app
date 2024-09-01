<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return Inertia::render('Users', [
            'users' => $users,
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return back();
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $password = $data['password'] ?? null;
        if (is_null($password)) {
            unset($data['password']);
        }

        $user->update($data);
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

}
