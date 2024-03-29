<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $status = Status::orderByDesc('id')->paginate(10);

        return view('pages.menu.status.index', compact (['status']));
    }
}
