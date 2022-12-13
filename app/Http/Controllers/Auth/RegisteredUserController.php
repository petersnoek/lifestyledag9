<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Rules\ClassCodePattern;
use App\Rules\EmailPattern;
use App\Rules\NamePattern;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255', new NamePattern()],
            'insertion' => ['string', 'max:255', new NamePattern()],
            'lastName' => ['required', 'string', 'max:255', new NamePattern()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new EmailPattern()], 
            'class_code' => ['required', 'string', new ClassCodePattern()],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ],
        [
         'password.min'=> 'Je wachtwoord moet uit minimaal 8 tekens bestaan.', // custom message
        ]
        );

        $user = User::create([
            'firstName' => $request->firstName,
            'insertion' => $request->insertion,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'class_code' => $request->class_code,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', 'student')->first()->id;
        $user->syncRoles($role);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
