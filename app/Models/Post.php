<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'status', 'thumnbnail_path', 'content',
    ];
}
