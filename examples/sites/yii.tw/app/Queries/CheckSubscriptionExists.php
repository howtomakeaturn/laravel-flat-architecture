<?php

namespace App\Queries;

use App\Models\Subscription;

class CheckSubscriptionExists extends Base
{
    public function handle($email)
    {
        return Subscription::where('email', $email)->count() === 0;
    }
}
