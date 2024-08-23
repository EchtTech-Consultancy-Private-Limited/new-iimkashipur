<?php

namespace App\Listeners;

use App\Events\EmailTemplating;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmailTemplating  $event
     * @return void
     */
    public function handle(EmailTemplating $event)
    {
        //
    }
}
