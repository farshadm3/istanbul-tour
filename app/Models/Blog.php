<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    public function related()
    {
        return $this->where([
            ['id', '!=', $this->id]
        ])->orderBy('id', 'desc')->take(6)->get();
    }
}
