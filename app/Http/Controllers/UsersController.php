<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Rules\NamePattern;
use App\Rules\ClassCodePattern;

class UsersController extends Controller
{
    public function index() {
        $users = User::orderBy('first_name')->paginate(10);

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

    // Update gegevens van de student
    public function update2(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => ['max:255', 'nullable', new NamePattern()],
            'class_code' => [new ClassCodePattern()]
        ]);

        if ($validator->fails()) {
            return redirect()->route('settings')->withinput($request->all())->with('errors', $validator->errors()->getMessages());
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->class_code = $request->input('class_code');
        $user->email = $request->input('email');

        // Als een request input null is pak dan de waarde van de database
        if($request->name == null){
            $user->name = Auth::user()->name;
        }
        if($request->class_code == null){
            $user->class_code = Auth::user()->class_code;
        }
        if($request->email == null){
            $user->email = Auth::user()->email;
        }

        $user->update();

        return redirect()->back();
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function resentAttachment() {
        Artisan::call('info:day');
        Artisan::call('info:student');
        return redirect()->route('users.index');
    }
}
