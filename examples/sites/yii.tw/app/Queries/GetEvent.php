<?php

namespace App\Queries;

use App\Models\Event;

class GetEvent extends Base
{
    public function handle($id)
    {
        $event = Event::find($id);

        return $event;
    }
}
