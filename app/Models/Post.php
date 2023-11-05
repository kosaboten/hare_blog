<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 属性としてimage_urlを取得できるようになる
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }

    // 属性としてimage_pathを取得できるようになる
    public function getImagePathAttribute()
    {
        return 'images/posts/' . $this->image;
    }
}
