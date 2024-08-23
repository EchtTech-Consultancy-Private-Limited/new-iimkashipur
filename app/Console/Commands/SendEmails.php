<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Mail\NCNCMail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail description';

    /**
     * Execute the console command.
     *
     * @return int
     */
   
    public function handle()
    {
        Log::info("+----------------------------------------------------+");
        Log::info("|-------------- Running Certificate Template Refresher -----------|");
        Log::info("+----------------------------------------------------+\n");

        $name = 'Brijesh';
        Mail::to('brijesh.mca12@gmail.com')->send(new NCNCMail($name));

        $this->info('Templates successfully refreshed');
        Log::info("|------------------- ALL DONE! -------------------|");
    }
    
}
