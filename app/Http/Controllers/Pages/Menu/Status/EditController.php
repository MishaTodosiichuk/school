<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Status $status)
    {
        return view('pages.menu.status.edit', compact (['status']));
    }
}
