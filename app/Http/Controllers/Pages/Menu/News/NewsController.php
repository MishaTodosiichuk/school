<?php

namespace App\Http\Controllers\Pages\Menu\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\Menu\News\StoreRequest;
use App\Http\Requests\Pages\Menu\News\UpdateRequest;
use App\Models\News;
use App\Models\Image;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderByDesc('id')->paginate(10);

        return view('pages.news.index', compact(['news']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->back()->with('status', 'Нову новину додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {

        $photos = Image::where('news_id', $news->id)->get();
        $files = File::where('news_id', $news->id)->get();


        return view('pages.news.show', compact('news', 'photos', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('pages.news.edit', compact(['news']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, News $news)
    {
        $data = $request->validated();
        $this->service->update($data, $news);
        return redirect()->back()->with('status', 'Оновлення успішне!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        $this->service->delete($news);
        return redirect()->back()->with('status', 'Новину успішно видалено!');
    }
}
