<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteTeacher extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        return $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('')->markdown('mail.invite-teacher')
                ->with([
                    'name'      =>  $this->data['name'],
                    'email'     =>  $this->data['email'],
                    'password'  =>  $this->data['password'],
                    'school'    =>  $this->data['school'],
                    'subject'   =>  $this->data['subject'],
                ]);
    }
}
