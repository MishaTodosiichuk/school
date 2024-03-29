<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsImage;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    public function __invoke(News $news)
    {
        $news->delete();
        $news_id = $news->id;
        $images = NewsImage::where('news_id',$news_id)->get();
        foreach ($images as $image){
            $image->delete();
        }

        Storage::disk('public')->deleteDirectory('news/' . $news_id);
        return redirect()->back()->with('status','Новину успішно видалено!');
    }
}
