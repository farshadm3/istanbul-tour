<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ToursCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($tour) {
                return [
                    'id' => $tour->id,
                    'name' => $tour->name,
                    'rate' => $tour->rate,
                    'rate_count' => $tour->rate_count,
                    'lat' => $tour->latitude,
                    'lan' => $tour->longitude,
                    'img' => $tour->info->image ?? '',
                    'cat_id' => $tour->category_id
                ];
            })
        ];
    }
}
