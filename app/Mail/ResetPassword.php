<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    protected $message;
    protected $reply;
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function build()
    {
        $data=$this->data;
        return $this->markdown('emails.auth.reset',compact('data'));
    }
}
