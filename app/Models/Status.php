<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'info',
        'img',
    ];
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
