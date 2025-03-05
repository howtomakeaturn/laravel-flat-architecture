<?php

namespace App\Queries;

use App\Models\Event;

class GetFilteredEventsWithPagination extends Base
{
    public function handle(
        $city = null,
        $place = null,
        $category = null,
        $filter = null,
        $q = null,
        $sort = null,
        $perPage = 10
    ) {
        $events = Event::query();

        if ($sort === 'hot') {
            $events->orderBy('trending_score', 'desc');
        }

        $events->orderBy('created_at', 'desc');

        // 狀態篩選
        match ($filter) {
            'pending' => $events->where('status', Event::STATUS_CREATED),
            'approved' => $events->where('status', Event::STATUS_APPROVED),
            'hidden' => $events->where('status', Event::STATUS_HIDDEN),
            'downloadable' => $events->where('image', '!=', '')->where('image_file_name', ''),
            default => null, // 'all' 或未提供 `filter` 則不過濾
        };

        if ($city) {
            $events->where('city', $city);
        }

        if ($category) {
            $events->where('category', $category);
        }

        if ($place) {
            $events->where('place_key', $place);
        }

        if ($q) {
            $events->where(function ($query) use ($q) {
                $query->where('title', 'LIKE', "%{$q}%")
                    ->orWhere('description', 'LIKE', "%{$q}%")
                    ->orWhere('place_key', 'LIKE', "%{$q}%");
            });
        }

        return $events->paginate($perPage);
    }
}
