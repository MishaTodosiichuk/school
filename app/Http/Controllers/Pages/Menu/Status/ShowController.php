<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Status;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Status $status)
    {
        $photos = Image::where('status_id', $status->id)->get();

        return view('pages.menu.status.show', compact('status' , 'photos'));
    }
}
