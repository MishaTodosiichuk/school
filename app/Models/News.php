<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'info',
        'count_views',
    ];
    public function images()
    {
        return $this->hasMany('App\NewsImage');
    }
}
