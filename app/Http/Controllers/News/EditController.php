<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(News $news)
    {
        return view('pages.news.edit', compact (['news']));
    }
}
