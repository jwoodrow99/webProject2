<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $formData;
    public $userLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData, $user)
    {
        $this->subject = $formData['subject'];
        $this->message = $formData['message'];
        $this->formData = $formData;
        $this->userLink = "customer/" . $user->customer->id . "/edit";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newsletter')->subject($this->subject)->with([
            'sub' => $this->subject,
            'msg' => $this->message,
            'userLink' => $this->userLink
        ]);
    }
}
