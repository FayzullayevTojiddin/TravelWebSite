<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'media_path', 'media_type',
    ];

    public static function lastBlog()
    {
        return self::orderBy('created_at', 'desc')->first();
    }
}
