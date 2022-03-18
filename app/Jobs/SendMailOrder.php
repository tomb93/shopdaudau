<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\orderMailCustomer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    public function __construct($email)
    {
        $this->email = $email;
    }


    public function handle()
    {
        Mail::to($this->email)->send(new orderMailCustomer());
    }
}
