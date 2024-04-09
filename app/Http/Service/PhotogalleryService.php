<?php

namespace App\Http\Service;

use App\Models\Photogallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class PhotogalleryService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['path'] = Storage::disk('public')->put('/images/photogallery', $data['path']);
            Photogallery::query()->create($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            alert(500);
        }

    }
}
