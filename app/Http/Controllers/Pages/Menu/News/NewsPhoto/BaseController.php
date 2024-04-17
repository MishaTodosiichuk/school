<?php

namespace App\Http\Controllers\Pages\Menu\News\NewsPhoto;

use App\Http\Controllers\Controller;
use App\Http\Service\News\NewsPhotoService;

class BaseController extends Controller
{
    public $service;

    public function __construct(NewsPhotoService $service)
    {
        $this->service = $service;
    }
}
