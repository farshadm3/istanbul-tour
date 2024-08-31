<?php

namespace App\Http\Controllers\Api\publicApi\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryCollection;
use App\Http\Resources\V1\DestinationCollection;
use App\Http\Resources\V1\ToursCollection;
use App\Models\Category;
use App\Models\Tour;
use App\Models\Village;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function categories(Request $request)
    {
        $categories = Category::take(6)->orderBy('sorting', 'asc')->get();
        return new CategoryCollection($categories);
    }

    public function featureTours(Request $request)
    {
        $tourId = $request->tourId ?? 1;
        $tours = Tour::where('category_id', $tourId)->take(6)->get();
        return new ToursCollection($tours);
    }

    public function destinations()
    {
        $destinations = Village::take(6)->orderBy('id', 'desc')->get();
        return new DestinationCollection($destinations);
    }
}
