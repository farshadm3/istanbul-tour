<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SingleBlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'content' => $blog->content,
                    'summary' => $blog->summary,
                    'img' => $blog->image,
                    'visits' => $blog->visits,
                    'page_id' => $blog->page_id,
                    'lang_id' => $blog->lang_id,
                    'post_id' => $blog->post_id,
                    'meta_desc' => $blog->meta_desc ?? '',
                    'meta_keywords' => $blog->info->meta_keywords ?? '',
                    'related' => new BlogsCollection($blog->related())
                ];
            })
        ];
    }
}
