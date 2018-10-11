<?php

namespace BlazeCMS\Web\Mail;


use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;


class ContactMail extends Mailable
{
    // use Queueable, SerializesModels;

    private $request;
    private $template;
    private $contact;
    private $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $contact, Request $request)
    {
        $this->request = $request;
        $this->template = $template;
        $this->contact = $contact;
        $this->files = $request->allFiles();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $builder = $this->view($this->template)->subject($this->contact->subject)->with($this->request->all());

        foreach ($this->files as $file) {
            $builder->attach($file, ['as' => $file->getClientOriginalName()]);
        }

        return $builder;
    }
}
