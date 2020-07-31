<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $receiver;
    public $reason;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $receiver, $reason)
    {
        //
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->receiver);
        return $this->from($this->sender->email)
            ->view('mails.report-reject', [
                'sender' => $this->sender,
                'receiver' => $this->receiver,
                'reason' => $this->reason,
            ]);
    }
}
