<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SingleTourCollection extends ResourceCollection
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
                    'cat_id' => $tour->category_id,
                    'img' => $tour->info->image ?? '',
                    'title' => $tour->info->title_h1 ?? '',
                    'meta_desc' => $tour->info->meta_desc ?? '',
                    'meta_keywords' => $tour->info->meta_keywords ?? '',
                    'related' => new ToursCollection($tour->related())
                ];
            })
        ];
    }
}
