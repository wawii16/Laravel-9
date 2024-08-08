<?php

namespace App\Jobs;

use App\Mail\NewsLetter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessNewsletter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $user;
    protected $subject;
    protected $content;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $content)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new NewsLetter($this->user, $this->subject, $this->content));
    }
}
