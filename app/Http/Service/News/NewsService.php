<?php

namespace App\Http\Service\News;

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
            News::query()->create($data);
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
            Storage::disk('public')->deleteDirectory('images/news/' . $news_id);
            DB::commit();
        }
        catch (Exception $exception){
            DB::rollBack();
            alert(500);
        }
    }
}
