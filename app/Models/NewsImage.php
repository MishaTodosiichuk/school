<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'news_id',
        'path',
    ];

    public function status()
    {
        return $this->belongsTo('App\News');
    }
}
