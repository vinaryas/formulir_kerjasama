<?php

namespace App\Listeners;

use App\Events\PengajuanProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPengajuanEmail
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
     * @param  \App\Events\PengajuanProcessed  $event
     * @return void
     */
    public function handle(PengajuanProcessed $event)
    {
        //
    }
}
