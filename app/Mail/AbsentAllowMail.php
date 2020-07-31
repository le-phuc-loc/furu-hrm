<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AbsentAllowMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $receiver;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $receiver)
    {
        //
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender->email)
            ->view('mails.absent-allow', [
                'receiver' => $this->receiver,
            ]);
    }
}
