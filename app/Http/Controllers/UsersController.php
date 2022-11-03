<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index() {
        $users = User::orderBy('name')->paginate(10);

        return response()->view('users.index', compact('users'));
    }

    public function create() {
        return response()->view('users.create');
    }

    public function store(User $user, StoreUserRequest $request) {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'test'
        ]));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    public function show(User $user) {
        return response()->view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user) {
        return response()->view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function update(User $user) {
        $user->update();

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    // Update klascode van de student
    public function update2(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->classCode = $request->input('classCode');
        // $user->email = $request->input('email');
        $user->update();
        
        return redirect()->back()->with('status','User updated successfully');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
