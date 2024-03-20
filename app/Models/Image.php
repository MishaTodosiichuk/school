<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'status_id',
        'path',
    ];

    public function status()
    {
        return $this->belongsTo('App\Post');
    }
}
