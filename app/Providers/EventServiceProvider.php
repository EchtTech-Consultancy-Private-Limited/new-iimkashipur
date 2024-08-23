<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use function Illuminate\Events\queueable;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\EmailTemplating;
use App\Listeners\SendEmailNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // custom login event listener
        Login::class => [
            LogSuccessfulLogin::class,
        ],

        // custom email templating event listener
        EmailTemplating::class => [
            SendEmailNotification::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(queueable(function (EmailCampaignEvent $event) {
        //     //
        // })->onQueue(env('SQS_HEAVY_TASK_QUEUE')));
    }
}
