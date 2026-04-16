<?php

namespace App\Observers;

use App\Models\Newcomment;

class NewcommentObserver
{
    /**
     * Handle the Newcomment "created" event.
     */
    public function created(Newcomment $newcomment): void
    {
        //
    }

    /**
     * Handle the Newcomment "updated" event.
     */
    public function updated(Newcomment $newcomment): void
    {
        //
    }

    /**
     * Handle the Newcomment "deleted" event.
     */
    public function deleted(Newcomment $newcomment): void
    {
        //
    }

    /**
     * Handle the Newcomment "restored" event.
     */
    public function restored(Newcomment $newcomment): void
    {
        //
    }

    /**
     * Handle the Newcomment "force deleted" event.
     */
    public function forceDeleted(Newcomment $newcomment): void
    {
        //
    }
}
