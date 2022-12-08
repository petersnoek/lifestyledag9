<?php

namespace App\Http\Controllers;

use JsValidator;
use App\Models\User;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Eventround;
use App\Rules\PhonePattern;
use Illuminate\Support\Str;
use App\Rules\LetterPattern;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\OrganisationNamePattern;
use App\Events\WorkshopholderGenerated;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selectedContacts = [];
        return response()->view('contacts.index', [
            'contacts' => Contact::all(),
            'selectedContacts' => $selectedContacts
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate_users(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "contacts" => "required|array|min:1"
        ]);

        if ($validator->fails()) {
            return redirect()->route('contacts.index')->with('errors', ['Geen contacten geselecteerd.']);
        }

        $failedUsers = [];

        foreach ($request->contacts as $value) {
            $contact = Contact::find($value);
            $fullname = trim($contact->displayName());

            if ($contact->user_id !== null) {
                array_push($failedUsers, ['contact'=> $contact, 'errors'=> ['Contact heeft al een gebruiker.']]);
                continue;
            }

            if ($fullname == null || $fullname == '') {
                array_push($failedUsers, ['contact'=> $contact, 'errors'=> ['Contact heeft geen naam.']]);
                continue;
            }

            $inputValues['email'] = $contact->email;
            $validator2 = Validator::make($inputValues, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);

            if ($validator2->fails()) {
                array_push($failedUsers, ['contact'=> $contact, 'errors'=> $validator2->errors()]);
                continue;
            }

            $unhashed_random_password = Str::random(10);
            $hashed_random_password = Hash::make($unhashed_random_password);

            $user = User::create([
                'name' => $contact->displayName(),
                'email' => $contact->email,
                'password' => $hashed_random_password,
            ]);

            $role = Role::where('name', 'workshophouder')->first()->id;
            $user->syncRoles($role);

            // $contact->user()->attach($user->id);
            // $contact->created_by()->attach(Auth::user()->id);

            // $contact->last_edited_by()->sync(Auth::user()->id);

            // $contact->last_edited_by()->save(Auth::user());
            // $user2 = User::find(Auth::user()->id);

            // $contact->user()->associate($user);
            // $contact->last_edited_by()->associate($user2);
            // $user->contact_last_edited_by()->save(Auth::user());

            $contact->user_id = $user->id;
            $contact->last_edited_by = Auth::user()->id;
            $contact->save();
            // $contact->user()->save($user->id);
            // $contact->created_by()->save(Auth::user()->id);

            event(new WorkshopholderGenerated($user->email, $unhashed_random_password));
        }

        if (is_array($failedUsers) && count($failedUsers) >= 1) {
            return redirect()->route('contacts.index')->with([
                'fail'=> 'sommige workshophouders konden niet worden aangemaakt',
                'failedUsers'=> $failedUsers
            ]);
        } else {
            return redirect()->route('contacts.index')->withSuccess(__('Alle workshophouders aangemaakt.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return response()->view('contacts.create', [
    //         'events' => Event::all(),
    //         'rounds' => Eventround::all()
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // firstname
    //     // surname
    //     // lastname
    //     // on_mailinglist
    //     // organisation
    //     // email
    //     // phonenumber

    //     // larvel, make a validator for firstname, surname, lastname, on_mailinglist, organisation, email and phonenumber
    //     // larvel, make a validator for firstname
    //     $validator = Validator::make($request->all(), [
    //         'firstname' => ['required'],
    //         'surname' => [],
    //         'lastname' => ['required'],
    //         'organisation' => ['required'],
    //         'email' => ['required', 'email'],
    //         'on_mailinglist' => ['required'],
    //         'phonenumber' => ['required', new PhonePattern(), 'digits_between:10,11'],
    //     ]);

    //     // $validator = Validator::make($request->all(), [
    //     //     'name' => ['required', 'max:255', new NamePattern()],
    //     //     'description' => [new DescriptionPattern()],
    //     //     'event_id' => ['required', Rule::exists(Event::class, 'id')], /* this error gives 'The event id field is required.' which might not be a good error message */
    //     //     'image' => ['image','mimes:jpeg,png,jpg'], /* needs file type validation */
    //     //     'max_participants' => ['required', 'numeric', 'min:0', 'max:1000']
    //     // ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('contacts.create')->withinput($request->all())->with('errors', $validator->errors());
    //     }

    //     // create new activity object and insert data into corresponding attribute
    //     $contact = new Contact();
    //     // $contact->name = $request->name;
    //     // $contact->description = $request->description;
    //     $contact->owner_user_id = Auth::user()->id;
    //     // $contact->save();

    //     return redirect()->route('contacts.index');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // testing server side validation
    protected $validationRules = [
        'firstname' => ['required', new LetterPattern()],
        'surname' => [new LetterPattern()],
        'lastname' => ['required', new LetterPattern()],
        'organisation' => ['required', new OrganisationNamePattern()],
        'email' => ['required', 'email'],
        'on_mailinglist' => ['required', 'boolean'],
        'phonenumber' => ['required', new PhonePattern()],
    ];

    public function create()
    {
        $validator = JsValidator::make($this->validationRules);

        return response()->view('contacts.create', [
            'events' => Event::all(),
            'rounds' => Eventround::all(),
            'validator' => $validator
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            return redirect()->route('contacts.create')->withinput($request->all())->with('errors', $validator->errors());
        }

        trim(strtolower(ucfirst($request->firstname)));

        $contact = new Contact();
        $contact->firstname = Contact::nameTrimming($request->firstname);
        $contact->surname = Contact::surNameTrimming($request->surname);
        $contact->lastname = Contact::nameTrimming($request->lastname);
        $contact->organisation = $request->organisation;
        $contact->email = $request->email;
        $contact->on_mailinglist = $request->on_mailinglist;
        $contact->phonenumber = $request->phonenumber;
        $contact->save();

        return redirect()->route('contacts.index')->withSuccess('Contactpersoon is aangemaakt.');
    }
}
