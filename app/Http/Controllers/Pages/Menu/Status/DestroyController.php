<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    public function __invoke(Status $status)
    {
        $status->delete();
        $status_id = $status->id;
        $images = Image::where('status_id',$status_id)->get();
        foreach ($images as $image){
            $image->delete();
        }

        Storage::disk('public')->deleteDirectory('status/' . $status_id);
        return redirect()->back()->with('status','Пост успішно видалено!');
    }
}
