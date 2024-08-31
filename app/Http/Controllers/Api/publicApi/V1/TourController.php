<?php

namespace App\Http\Controllers\Api\publicApi\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SingleTourCollection;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function singleTour(Request $request, $tourId)
    {
        $tour = Tour::whereId($tourId)->get();
        return new SingleTourCollection($tour);
    }
}
