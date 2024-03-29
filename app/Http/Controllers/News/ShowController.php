<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(News $news)
    {
        $photos = NewsImage::where('news_id', $news->id)->get();

        return view('pages.news.show', compact('news' , 'photos'));
    }
}
