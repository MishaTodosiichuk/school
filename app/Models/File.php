<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'path',
        'news_id',
    ];

    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
