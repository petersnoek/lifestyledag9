<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Eventround;
use App\Rules\PhonePattern;
use App\Rules\SurnamePattern;
use App\Rules\LetterPattern;
use App\Rules\OrganisationNamePattern;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

            $contact->user_id = $user->id;
            $contact->last_edited_by = Auth::user()->id;
            $contact->save();

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
    public function create()
    {
        return response()->view('contacts.create', [
            'events' => Event::all(),
            'rounds' => Eventround::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required', new LetterPattern(), 'max:255'],
            'surname' => [new SurnamePattern(), 'max:255'],
            'lastname' => ['required', new LetterPattern(), 'max:255'],
            'organisation' => ['required', new OrganisationNamePattern(), 'max:255'],
            'email' => ['required', 'email:rfc,dns', Rule::unique(contact::class) , 'max:255'],
            'on_mailinglist' => ['required', 'boolean'],
            'phonenumber' => ['nullable', new PhonePattern(), 'max:12'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('contacts.create')->withinput($request->all())->with('errors', $validator->errors());
        }

        $contact = new Contact();
        $contact->firstname = Contact::nameTrimming($request->firstname);
        $contact->surname = Contact::SurnameTrimming($request->surname);
        $contact->lastname = Contact::nameTrimming($request->lastname);
        $contact->organisation = trim($request->organisation);
        $contact->email = trim($request->email);
        $contact->on_mailinglist = $request->on_mailinglist;
        $contact->mobiel = $request->phonenumber;
        $contact->save();

        return redirect()->route('contacts.index')->withSuccess('Contactpersoon is aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $event_id = ['event_id' => Crypt::decrypt($event_id)];
        // $validator = Validator::make($event_id, [
        //     'event_id' => ['required', Rule::exists(Event::class, 'id')]
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->route('dashboard')->withinput($event_id['event_id'])->with('errors', $validator->errors());
        // }

        // return response()->view('contacts.edit', [

        // ]);
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
        $validator = Validator::make($request->all(), [
            'id' => ['bail', 'required', 'integer', 'min:1', Rule::exists(contact::class, 'id')],
            'firstname' => ['required', new LetterPattern(), 'max:255'],
            'surname' => [new SurnamePattern(), 'max:255'],
            'lastname' => ['required', new LetterPattern(), 'max:255'],
            'organisation' => ['required', new OrganisationNamePattern(), 'max:255'],
            'email' => ['required', 'email:rfc,dns', Rule::unique(contact::class)->ignore($request->id), 'max:255'],
            'on_mailinglist' => ['required', 'boolean'],
            'phonenumber' => ['nullable', new PhonePattern(), 'max:12'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('contacts.edit')->withinput($request->all())->with('errors', $validator->errors());
        }

        $contact = Contact::find($request->id);
        $contact->firstname = Contact::nameTrimming($request->firstname);
        $contact->surname = Contact::SurnameTrimming($request->surname);
        $contact->lastname = Contact::nameTrimming($request->lastname);
        $contact->organisation = trim($request->organisation);
        $contact->email = trim($request->email);
        $contact->on_mailinglist = $request->on_mailinglist;
        $contact->mobiel = $request->phonenumber;
        // $contact->save();

        return redirect()->route('contacts.index')->withSuccess('Contactpersoon is aangepast.');
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
}
