<?php

namespace BlazeCMS\Http\Admin;



use BlazeCMS\Requests\ContactRequest;
use BlazeCMS\Services\ContactService;
use Illuminate\Http\Request;


class ContactController extends AdminController
{

    private $contactService;


    public function __construct(ContactService $contactService)
    {

        $this->contactService = $contactService;

    }


    public function index(Request $request)
    {

        $name = $request->name;
        $department = $request->department;
        $location = $request->location;
        $emails = $request->emails;

        $contacts = $this->contactService->query($request);


        return view('setting.contact.index',
            compact(
                'name',
                'department',
                'location',
                'emails',
                'contacts'
            ));
    }


    public function create()
    {
        $emails = [];

        return view('setting.contact.create', compact('emails'));
    }


    public function store(ContactRequest $request)
    {

      //  dd($request->emails);


        $this->contactService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\ContactController@index');

    }


    public function edit($id)
    {


        $contact = $this->contactService->find($id);
        $emails =  $contact->emails();


        return view('setting.contact.edit', compact('contact', 'emails'));
    }


    public function update(ContactRequest $request, $id)
    {
        $this->contactService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->contactService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\ContactController@index');
    }


}
