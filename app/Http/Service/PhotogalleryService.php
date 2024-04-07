<?php

namespace App\Http\Service;

use App\Models\Photogallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class PhotogalleryService
{
    public function store($images)
    {
        try {
            DB::beginTransaction();
            if (isset($images))
            foreach ($images as $image) {
                $image['path'] = Storage::put('/images', $image['path']);
                Photogallery::query()->create();
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            alert(500);
        }

    }
}
