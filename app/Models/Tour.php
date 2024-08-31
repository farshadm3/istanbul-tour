<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function info()
    {
        return $this->hasOne(TourInfo::class);
    }

    public function related()
    {
        return $this->where([
            ['category_id', $this->category_id],
            ['id', '!=', $this->id]
        ])->orderBy('id', 'desc')->take(6)->get();
    }
}
