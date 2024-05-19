<?php

namespace App\Http\Service\News;

use App\Models\File;
use App\Models\Image;
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
            if (isset($news_photo['news_images'])) {

                foreach ($news_photo['news_images'] as $path) {
                    $path = Storage::disk('public')->put('/images/news/' . $news_id, $path);
                    Image::query()->create([
                        'news_id' => $news_id,
                        'path' => $path
                    ]);
                }
            }

            if (isset($news_photo['news_files'])) {
                foreach ($news_photo['news_files'] as $path) {
                    $originalName = $path->getClientOriginalName();
                    $path = Storage::disk('public')->putFileAs('files', $path, $originalName);
                    File::query()->create([
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
