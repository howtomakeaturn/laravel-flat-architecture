<?php

namespace App\Queries;

use App\Models\Subscription;

class GetLatestSubscriptions extends Base
{
    public function handle()
    {
        $subscriptions = \App\Models\Subscription::limit(100)
            ->orderBy('created_at', 'desc')->get();

        return $subscriptions;
    }
}
