<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $news = News::orderByDesc('id')->paginate(10);

        return view('pages/home', compact (['news']));
    }
}
