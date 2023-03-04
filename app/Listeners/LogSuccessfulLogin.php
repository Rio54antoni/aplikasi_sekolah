<?php

namespace App\Listeners;

use App\Models\LoginSession;
use Illuminate\Auth\Events\Login;
use Jenssegers\Agent\Agent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $agent = new Agent();

        $loginSession = new LoginSession();
        $loginSession->user_id = $user->id;
        $loginSession->device = $agent->device();
        $loginSession->platform = $agent->platform();
        $loginSession->browser = $agent->browser();
        $loginSession->login_time = now();
        $loginSession->save();
    }
}
