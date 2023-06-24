<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PronoorEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $content;
    public $first_name;
    public $last_name;

    /**
     * Create a new message instance.
     *
     * @param string $title
     * @param string $content
     * @param string $first_name
     * @param string $last_name
     * @return void
     */
    public function __construct($first_name, $last_name, $content)
    {
        $this->content = $content;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to ProNoor')
            ->view('emails.contact_us');
    }
}
