<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/24/2016
 * Time: 10:58
 */

namespace BlazeCMS\Http\Web;



use BlazeCMS\Http\Controller;
use BlazeCMS\Web\Mail\Request\ContactRequest;
use BlazeCMS\Web\Mail\Request\IrContactRequest;
use BlazeCMS\Web\Mail\Request\WhistleblowingRequest;
use BlazeCMS\Web\Mail\Request\ApplicationRequest;
use BlazeCMS\Web\Services\MailService;


class MailController extends Controller
{


    private $mailService;


    public function __construct( MailService $mailService)
    {

        $this->mailService = $mailService;

    }




    //contact
    public function contact(ContactRequest $request)
    {
        try {
            $this->mailService->send($request);

        } catch (\Exception $e) {
            flash_error($e->getMessage());

            return back();
        }

        flash_success('the mail is successfully sent');

        return back();
    }


    //ir contact
    public function irContact(IrContactRequest $request)
    {

        try {
            $this->mailService->sendIr($request);

        } catch (\Exception $e) {
            flash_error($e->getMessage());

            return back();
        }

        flash_success('the mail is successfully sent');

        return back();
    }

    //whistleblowing
    public function whistleblowing(WhistleblowingRequest $request)
    {

        try {
            $this->mailService->sendIssue($request);

        } catch (\Exception $e) {
            flash_error($e->getMessage());

            return back();
        }

        flash_success('the mail is successfully sent');

        return back();
    }

    //application
    public function application(ApplicationRequest $request)
    {

        try {
            $this->mailService->sendApp($request);

        } catch (\Exception $e) {
            flash_error($e->getMessage());

            return back();
        }

        flash_success('the mail is successfully sent');

        return back();
    }

}
