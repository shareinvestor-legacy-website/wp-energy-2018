<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/24/2016
 * Time: 08:52
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Web\Mail\ContactMail;
use BlazeCMS\Models\Contact;
use Illuminate\Http\Request;
use Mail;


class MailService
{


    public function send(Request $request)
    {

        $contact = Contact::where('name', $request->name)->first();

        if($request->department){
            $contact = $contact->where('department', $request->department)->first();
        }

        $emails = $contact->emails();

        Mail::to($emails)->send(new ContactMail('mail.contact', $contact, $request));

    }

    public function sendIr(Request $request)
    {

        $contact = Contact::where('name', $request->name)->first();

        $emails = $contact->emails();

        Mail::to($emails)->send(new ContactMail('mail.ir-contact', $contact, $request));

    }

    public function sendIssue(Request $request)
    {

        $contact = Contact::where('name', $request->name)->first();
        if($request->department){
            $contact = $contact->where('department', $request->department)->first();
        }

        $emails = $contact->emails();

        Mail::to($emails)->send(new ContactMail('mail.whistleblowing', $contact, $request));

    }

    public function sendApp(Request $request)
    {

        $contact = Contact::where('name', $request->name)->first();

        $emails = $contact->emails();

        Mail::to($emails)->send(new ContactMail('mail.online-application', $contact, $request));

    }

}
