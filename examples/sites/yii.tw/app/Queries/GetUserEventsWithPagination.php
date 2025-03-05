<?php

namespace App\Queries;

use App\Models\Event;

class GetUserEventsWithPagination extends Base
{
    public function handle($id, $perPage = 10)
    {
        $events = Event::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return $events;
    }
}
