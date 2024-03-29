<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
class CreateController extends Controller
{
    public function __invoke()
    {
        return view('pages.menu.status.create');
    }
}
