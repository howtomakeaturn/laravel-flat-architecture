<?php

namespace App\Mutations;

use App\Models\Subscription;

class CreateSubscription extends Base
{
    public function handle(
        $email,
        $city,
    ) {
        $subscription = new Subscription();

        $subscription->email = $email;

        $subscription->city = $city;

        $subscription->save();

        return $subscription;
    }
}
