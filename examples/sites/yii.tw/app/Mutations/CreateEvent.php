<?php

namespace App\Mutations;

use App\Models\Event;

class CreateEvent extends Base
{
    public function handle(
        $title,
        $url,
        $description,
        $city,
        $category,
        $placeName,
        $from,
        $to,
        $inDates,
        $imageFileName,
        $userId,
    ) {
        $event = new Event();

        $event->title = $title;
        $event->url = $url;
        $event->description = $description;
        $event->key = time();
        $event->city = $city;

        $categoryMapping = [
            'expo' => Event::CATEGORY_EXHIBITION,
            'music' => Event::CATEGORY_MUSIC,
            'drama' => Event::CATEGORY_DRAMA,
            'lecture' => Event::CATEGORY_LECTURE,
        ];

        $event->category = $categoryMapping[$category] ?? null;

        $event->place_key = $placeName;

        if ($category === 'expo') {
            $event->from_date = $from;
            $event->to_date = $to;
        } else {
            $event->in_dates = $inDates ? explode(',', $inDates) : [];
        }

        $event->source_type = Event::SOURCE_TYPE_AGGREGATOR;
        $event->status = Event::STATUS_CREATED;
        $event->image_file_name = $imageFileName;
        $event->user_id = $userId;

        $event->save();

        return $event;
    }
}
