<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($cat) {
                return [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'alias' => $cat->alias,
                    'icon' => $cat->icon,
                    'sorting' => $cat->sorting,
                ];
            })
        ];
    }
}
