<?php

namespace App\Http\Controllers\Pages\Menu\Photogallery;

use App\Http\Controllers\Controller;
use App\Http\Service\NewsService;
use App\Http\Service\PhotogalleryService;
use App\Models\Photogallery;

class BaseController extends Controller
{
    public $service;

    public function __construct(PhotogalleryService $service)
    {
        $this->service = $service;
    }
}
