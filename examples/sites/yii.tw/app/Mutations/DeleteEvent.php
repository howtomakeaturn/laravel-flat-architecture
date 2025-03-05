<?php

namespace App\Mutations;

use App\Models\Event;

class DeleteEvent extends Base
{
    public function handle($event)
    {
        $event->delete();
    }
}
