<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Notifications\OfferNotification;


class OfferListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::where('role_id', 2)->each(function(User $user) use ($event){
            Notification::send($user, new OfferNotification($event->offer));
            //$user->notify(new OfferNotification($offer));
        });
    }
}
