<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\Menu\Contacts\UpdateRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, News $news)
    {
        $data = $request->validated();
        $news->update($data);
        $newsId = $news->id;

        if ($request->hasFile('image')) {
            $images = NewsImage::where('status_id', $news->id)->get();
            foreach ($images as $data){
                $data->delete();
            }
            Storage::disk('public')->deleteDirectory('status/' . $newsId);
            foreach ($request->file('image') as $image) {
                $path = $image->storeAs('news/'. $newsId, $image->getClientOriginalName(), 'public');
                NewsImage::create([
                    'news_id' => $newsId,
                    'path' => $path
                ]);
            }
        }

        return redirect()->back()->with('status','Оновлення успішне!');
    }
}
