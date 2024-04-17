<?php

namespace App\Http\Controllers\Pages\Menu\News\NewsPhoto;

use App\Http\Requests\Pages\Menu\News\News_photo\StoreRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsPhotoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = News::all();

        return view('pages.news.news_photo.create', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $news_photo = $request->validated();
        $this->service->store($news_photo);
        return redirect()->back()->with('status','Фотографії для новини додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsImage $photos)
    {
        Storage::disk('public')->delete($photos->path);
        $photos->delete();
        return redirect()->back()->with('status','Фото успішно видалено!');
    }
}
