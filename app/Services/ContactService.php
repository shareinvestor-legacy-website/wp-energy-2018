<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Contact;
use Illuminate\Http\Request;


class ContactService implements ServiceInterface
{


    private function setFields(Contact $contact, Request $request)
    {

        $contact->name = $request->input('name');
        $contact->department = $request->filled('department') ? $request->input('department') : null;
        $contact->location = $request->filled('location') ? $request->input('location') : null;
        $contact->subject = $request->filled('subject') ? $request->input('subject') : null;

        if ($request->filled('emails')) {
            $contact->emails = implode(';', $request->emails);
        }


    }


    public function all()
    {
        return Contact::all();
    }


    public function find($id)
    {

        return Contact::findOrFail($id);

    }


    public function query(Request $request)
    {


        $contacts = Contact::query();


        if ($request->filled('name'))
            $contacts->where('name', 'like', "%$request->name%");

        if ($request->filled('department'))
            $contacts->where('department', 'like', "%$request->department%");

        if ($request->filled('location'))
            $contacts->where('location', 'like', "%$request->location%");

        if ($request->filled('emails'))
            $contacts->where('emails', 'like', "%$request->emails%");


        $contacts->orderBy('name', 'asc');


        return $contacts->paginate(setting('admin.paginate.contact.perPage'));
    }


    public function store(Request $request)
    {

        $contact = new Contact();

        $this->setFields($contact, $request);


        $contact->save();

    }


    public function update(Request $request, $id)
    {

        $contact = Contact::findOrFail($id);
        $this->setFields($contact, $request);


        $contact->save();

    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }


}