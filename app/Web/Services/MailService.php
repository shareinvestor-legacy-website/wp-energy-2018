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

        $contact = Contact::where('name', $request->department)->first();

        $emails = $contact->emails();

        Mail::to($emails)->send(new ContactMail('mail.contact', $contact, $request));

    }

}