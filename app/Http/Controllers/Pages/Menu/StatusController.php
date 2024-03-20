<?php

namespace App\Http\Controllers\Pages\Menu;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::orderByDesc('id')->paginate(10);

        return view('pages.menu.status.index', compact (['status']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.menu.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        $photos = Image::where('status_id', $status->id)->get();

        return view('pages.menu.status.show', compact('status' , 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('pages.menu.status.edit', compact (['status']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        $images = Image::where('status_id',$status->id)->get();
        foreach ($images as $image){
            $image->delete();
        }

        Storage::disk('public')->deleteDirectory('status/' . $status->id);
        return redirect()->back()->with('status','Пост успішно видалено!');
    }
}

