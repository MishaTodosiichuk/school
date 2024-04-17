<?php

namespace App\Http\Service\News;

use App\Models\NewsImage;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class NewsPhotoService
{
    public function store($news_photo)
    {
        try {
            DB::beginTransaction();
            $news_id = $news_photo['news_id'];
            if (isset($news_photo['path'])) {
                foreach ($news_photo['path'] as $path) {
                    $path = Storage::disk('public')->put('/images/news/'.$news_id, $path);
                    NewsImage::query()->create([
                        'news_id' => $news_id,
                        'path' => $path
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            alert(505);
        }
    }
}
