<?php

namespace App\Http\Service;

use App\Models\News;
use App\Models\NewsImage;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class NewsService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $news = News::query()->create($data);

            $newsId = $news->id;
            $news['prev_image'] = NewsImage::query()->where('news_id', $newsId)->first();
            if (isset($data['image'])) {
                foreach ($data['image'] as $image) {
                    $path = $image->store();
                    $path = Storage::disk('public')->put('/images/news/', $path);
                    NewsImage::query()->create([
                        'news_id' => $newsId,
                        'path' => $path
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $exception){
            DB::rollBack();
            alert(505);
        }

    }
    public function update($data, $news)
    {
        try {
            DB::beginTransaction();
            $newsId = $news->id;
            $images = NewsImage::query()->where('status_id', $news->id)->get();
            if (isset($images)) {
                foreach ($images as $image) {
                    $image->delete();
                }
                Storage::disk('public')->deleteDirectory('status/' . $newsId);
                foreach ($data->file('image') as $image) {
                    $path = $image->storeAs('news/' . $newsId, $image->getClientOriginalName(), 'public');
                    NewsImage::query()->create([
                        'news_id' => $newsId,
                        'path' => $path
                    ]);
                }
            }
            $news->update($data);
            DB::commit();
        } catch (Exception $exception){
            DB::rollBack();
            alert(500);
        }

    }

    public function delete($news)
    {
        try {
            DB::beginTransaction();
            $news_id = $news->id;
            $images = NewsImage::query()->where('news_id',$news_id)->get();
            foreach ($images as $image){
                $image->delete();
            }
            Storage::disk('public')->deleteDirectory('news/' . $news_id);
            DB::commit();
        }
        catch (Exception $exception){
            DB::rollBack();
            alert(500);
        }
    }
}
