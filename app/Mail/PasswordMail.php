<?php

namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;

class PasswordMail extends Mailable
{
   use Queueable, SerializesModels;
  
    public $password;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password)
    {
		
        $this->password = $password;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$password = $this->password;
        return $this->subject('Evolving Love')
                    ->view('frontend.email.password',compact('password'));
    }
}
