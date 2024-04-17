<?php

namespace App\Http\Service;

use App\Models\Image;
use App\Models\Status;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\alert;

class StatusService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            Status::query()->create($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            alert(505);
        }

    }

    public function update($data, $status)
    {
        try {
            DB::beginTransaction();
            $status->update($data);
            $statusId = $status->id;

            if ($data->hasFile('image')) {
                $images = Image::query()->where('status_id', $status->id)->get();
                foreach ($images as $data) {
                    $data->delete();
                }
                Storage::disk('public')->deleteDirectory('status/' . $statusId);
                foreach ($data->file('image') as $image) {
                    $path = $image->storeAs('status/' . $statusId, $image->getClientOriginalName(), 'public');
                    Image::query()->create([
                        'status_id' => $statusId,
                        'path' => $path
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            alert(500);
        }
    }
}
