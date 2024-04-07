<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Http\Service\StatusService;

class BaseController extends Controller
{
    public $service;

    public function __construct(StatusService $service)
    {
        $this->service = $service;
    }
}
