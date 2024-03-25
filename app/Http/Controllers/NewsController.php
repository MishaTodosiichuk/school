<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderByDesc('id')->paginate(10);

        return view('pages.news.index', compact (['news']));
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'info' => 'required',
        ]);
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

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $photos = NewsImage::where('news_id', $news->id)->get();

        return view('pages.news.show', compact('news' , 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('pages.news.edit', compact (['news']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'info' => 'required',
        ]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
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
