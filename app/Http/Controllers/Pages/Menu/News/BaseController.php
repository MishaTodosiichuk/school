<?php

namespace App\Http\Controllers\Pages\Menu\News;

use App\Http\Controllers\Controller;
use App\Http\Service\News\NewsPhotoService;
use App\Http\Service\News\NewsService;

class BaseController extends Controller
{
    public $service;

    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }
}
