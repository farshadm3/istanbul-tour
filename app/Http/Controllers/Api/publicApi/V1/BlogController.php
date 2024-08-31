<?php

namespace App\Http\Controllers\Api\publicApi\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogsCollection;
use App\Http\Resources\V1\SingleBlogCollection;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blogs()
    {
        $blogs = Blog::take(9)->orderBy('id', 'desc')->get();
        return new blogsCollection($blogs);
    }

    public function singleBlog(Request $request, $blogId)
    {
        $blog = Blog::whereId($blogId)->get();
        return new SingleBlogCollection($blog);
    }
}
