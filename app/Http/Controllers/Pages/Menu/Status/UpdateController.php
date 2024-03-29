<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Status $status)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'info' => 'required',
        ]);
        $status->update($data);
        $statusId = $status->id;

        if ($request->hasFile('image')) {
            $images = Image::where('status_id', $status->id)->get();
            foreach ($images as $data){
                $data->delete();
            }
            Storage::disk('public')->deleteDirectory('status/' . $statusId);
            foreach ($request->file('image') as $image) {
                $path = $image->storeAs('status/'. $statusId, $image->getClientOriginalName(), 'public');
                Image::create([
                    'status_id' => $statusId,
                    'path' => $path
                ]);
            }
        }

        return redirect()->back()->with('status','Оновлення успішне!');
    }
}
