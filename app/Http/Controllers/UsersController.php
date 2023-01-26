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
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index() {
        $users = User::orderBy('first_name')->paginate(10);

        return response()->view('users.index', compact('users'));
    }

    public function create() {
        return response()->view('users.create');
    }

    public function blocked() {
        return response()->view('users.blocked');
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

    public function edit(User $user) {
        return response()->view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function update(User $user) { /* doesn't work */
        $user->update();

        return redirect()->route('users.index')
            ->withErrors(__('functionaliteit nog niet geimplementeerd'));
    }

    // Update gegevens van de student
    public function update2(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'first_name' => ['max:255', 'nullable', new NamePattern()],
            'insertion' => ['max:255', 'nullable', new NamePattern()],
            'last_name' => ['max:255', 'nullable', new NamePattern()],
            'class_code' => [new ClassCodePattern()]
        ]);

        if ($validator->fails()) {
            return redirect()->route('settings')->withinput($request->all())->with('errors', $validator->errors()->getMessages());
        }

        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->insertion = $request->input('insertion');
        $user->last_name = $request->input('last_name');
        $user->class_code = $request->input('class_code');
        $user->email = $request->input('email');

        // Als een request input null is pak dan de waarde van de database
        if($request->first_name == null){
            $user->first_name = Auth::user()->first_name;
        }
        if($request->insertion == null){
            $user->insertion = Auth::user()->insertion;
        }
        if($request->last_name == null){
            $user->last_name = Auth::user()->last_name;
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

    public function blockConfirm(User $user){
        /* change role to blocked and delete all users enlistment and or activities*/
        if($user->roles[0]->name != 'admin' && $user->roles[0]->name != 'geblokkeerd'){
            return response()->view('users.block', [
                'user' => $user
            ]);
        }
        else{
            return redirect()->route('users.index')
            ->withErrors(__('Gebruiker kan niet worden geblokkeerd'));
        }
    }

    public function block(Request $request) {
        /* TODO: make sure it's a student account and also delete any enlistments */
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.index')
            ->withErrors(__('Onbekend User Account'));       
        }

        $user = User::find($request->user_id);

        if($user->roles[0]->name != 'admin' && $user->roles[0]->name != 'geblokkeerd'){
            if($user->roles[0]->name == 'student' && count($user->enlistments) > 0){
                //if user has enlistments loop through them and delete any that aren't too old/archived
                foreach($user->enlistments as $enlistment){
                    if($enlistment->event->ends_at > Carbon::now()->toDateTimeString()){
                        //if the enlistment is for an event that hasn't ended yet then it can delete it
                        $enlistment->delete();
                    }
                }
            }
            /* if($user->roles[0]->name == 'workshophouder' && count($user->activities) > 0){
                //if user has activities loop through them and delete any that aren't too old/archived
                foreach($user->activities as $activity){
                    if($activity->event->enlist_starts_at > Carbon::now()->toDateTimeString()){
                        //if the activity is for an event that hasn't ended yet then it can delete it
                        $activity->delete();
                    }
                }
                //verwijdert niet de activity rounds
            } */
            
            $role = Role::where('name', 'geblokkeerd')->first()->id;
            $user->syncRoles($role);

            return redirect()->route('users.index')
            ->withSuccess(__('Gebruiker \''. $user->first_name .'\' succesvol geblokkeerd.'));
        }
        else{
            return redirect()->route('users.index')
            ->withErrors(__('Gebruiker kan niet worden geblokkeerd'));
        }
        
    }

    public function test1(Request $request) {
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function resentAttachment() {
        Artisan::call('info:day');
        Artisan::call('info:student');
        return redirect()->route('users.index')->withSuccess(__('Email succesvol verstuurd.'));
    }
}
