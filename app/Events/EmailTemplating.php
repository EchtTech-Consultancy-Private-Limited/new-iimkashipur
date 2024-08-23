<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class EmailTemplating
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    public $data;

    public function __construct($data)
    {
        
        Log::info("Event Started: EmailTemplating: ".$data->mail_subject);

        $this->data = $data;

        Log::info("Event Ended: EmailTemplating: ".$data->mail_subject);
    }
}
