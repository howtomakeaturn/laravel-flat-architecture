<?php

namespace App\Mutations;

use App\Models\Event;

class UpdateEvent extends Base
{
    public function handle($event, $title, $description, $city, $url, $placeKey, $category, $fromDate, $toDate, $inDates, $imageFileName = null)
    {
        $event->title = $title;

        $event->description = $description;

        $event->city = $city;

        $event->url = $url;

        $event->place_key = $placeKey;

        $categoryMapping = [
            'expo' => Event::CATEGORY_EXHIBITION,
            'music' => Event::CATEGORY_MUSIC,
            'drama' => Event::CATEGORY_DRAMA,
            'lecture' => Event::CATEGORY_LECTURE,
        ];

        $event->category = $categoryMapping[$category] ?? null;

        if ($event->category == Event::CATEGORY_EXHIBITION) {
            $event->from_date = $fromDate;
            $event->to_date = $toDate;
            $event->in_dates = null;
        } else {
            $event->from_date = null;
            $event->to_date = null;
            $event->in_dates = $inDates;
        }

        if ($imageFileName) {
            $event->image_file_name = $imageFileName;
        }

        $event->save();

        event(new \App\Events\EventUpdated($event));

        return $event;
    }
}
