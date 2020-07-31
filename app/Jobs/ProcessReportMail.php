<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\ReportAllowMail;
use App\Mail\ReportRejectMail;
use App\Mail\AbsentAllowMail;
use App\Mail\AbsentRejectMail;
use Mail;

class ProcessReportMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $receiver;
    protected $data;
    protected $action;
    protected $sender;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sender, $receiver, $action, $data = null)
    {
        //
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->data = $data;
        $this->action = $action;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // dd($this->receiver);
        switch ($this->action) {
            case "report-allow":
                $email = new ReportAllowMail($this->sender, $this->receiver);
                Mail::to($this->receiver->email)->send($email);
            break;
            case "report-reject":
                $email = new ReportRejectMail($this->sender, $this->receiver, $this->data);
                Mail::to($this->receiver->email)->send($email);
            break;
            case "absent-allow":
                $email = new AbsentAllowMail($this->sender, $this->receiver, $this->data);
                Mail::to($this->receiver->email)->send($email);
            break;
            case "absent-reject":
                $email = new AbsentRejectMail($this->sender, $this->receiver, $this->data);
                Mail::to($this->receiver->email)->send($email);
            break;
          }

    }
}
