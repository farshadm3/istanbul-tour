<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourInfo extends Model
{
    use HasFactory;

    protected $table = 'tour_info';

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
