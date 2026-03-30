<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts->loadMissing(['securitas:id,name_securitas']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name_contact' => 'required|max:100',
        'number_contact' => 'required|max:100',
        'addres_contact' => 'required',
        'number_account_contact' => 'required|max:100',
        'id_securitas' => 'required',
        'number_contact' => 'required',
        ]);

        $contact = Contact::create($validated);

        return new ContactResource($contact->loadMissing('securitas:id,name_securitas'));
    }

    public function show($id){
        $contact = Contact::with('securitas:id,name_securitas')->findOrFail($id);
        return new ContactResource($contact->loadMissing(['securitas:id,name_securitas']));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'name_contact' => 'required|max:100',
        'number_contact' => 'required|max:100',
        'addres_contact' => 'required',
        'number_account_contact' => 'required|max:100',
        'id_securitas' => 'required',
        'number_contact' => 'required',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);
        return new ContactResource($contact->loadMissing(['securitas:id,name_securitas']));
    }
    public function destroy(Request $request, $id)
    {

    }
}
