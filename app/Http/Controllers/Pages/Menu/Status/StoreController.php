<?php

namespace App\Http\Controllers\Pages\Menu\Status;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Status;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'info' => 'required',
        ]);
        $status = Status::create($data);
        $statusId = $status->id;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->storeAs('status/'. $statusId, $image->getClientOriginalName(), 'public');
                Image::create([
                    'status_id' => $statusId,
                    'path' => $path
                ]);
            }
        }

        return redirect()->back()->with('status','Новий пост додано!');
    }
}
