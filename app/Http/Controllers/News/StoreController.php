<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\Menu\News\StoreRequest;
use App\Models\News;
use App\Models\NewsImage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, )
    {
        $data = $request->validated();
        $status = News::create($data);
        $statusId = $status->id;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->storeAs('news/'. $statusId, $image->getClientOriginalName(), 'public');
                NewsImage::create([
                    'news_id' => $statusId,
                    'path' => $path
                ]);
            }
        }

        return redirect()->back()->with('status','Нову новину додано!');
    }
}
