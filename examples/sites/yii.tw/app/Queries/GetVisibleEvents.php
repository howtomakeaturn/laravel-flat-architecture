<?php

namespace App\Queries;

use App\Models\Event;

class GetVisibleEvents extends Base
{
    public function handle()
    {
        $events = Event::where('city', '')
            ->where('status', '!=', Event::STATUS_HIDDEN)
            ->get();

        return $events;
    }
}
