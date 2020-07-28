<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\ReportMail;
use Mail;

class ProcessReportMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $receiver;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($receiver)
    {
        //
        $this->receiver = $receiver;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new ReportMail();
        Mail::to($this->receiver)->send($email);
    }
}
