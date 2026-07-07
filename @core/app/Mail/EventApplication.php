<?php

namespace App\Mail;
use App\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventApplication extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $subject;
    public $payment;
    public $event;
    public $app;
    public $message_body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($args)
    {
        $this->data = $args;
        $this->app = $args['app'];
        $this->event = Events::find($args['event_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(get_static_option('site_global_email'), get_static_option('site_'.get_default_language().'_title'))
            ->subject($this->data['subject'])
            ->view('mail.event-application');
    }
}
