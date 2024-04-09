<?php

namespace App\Http\Controllers\Pages\Menu\Status;


use App\Http\Requests\Pages\Menu\Status\StoreRequest;
use App\Http\Requests\Pages\Menu\Status\UpdateRequest;
use App\Models\Image;
use App\Models\Status;
use Illuminate\Support\Facades\Storage;

class StatusController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::orderByDesc('id')->paginate(10);

        return view('pages.menu.status.index', compact(['status']));
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
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        
        $this->service->store($data);

        return redirect()->back()->with('status', 'Новий пост додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        $photos = Image::where('status_id', $status->id)->get();

        return view('pages.menu.status.show', compact('status', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('pages.menu.status.edit', compact(['status']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Status $status)
    {
        $data = $request->validated();

        $this->service->update($data, $status);

        return redirect()->back()->with('status', 'Оновлення успішне!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        $status_id = $status->id;
        $images = Image::where('status_id', $status_id)->get();
        foreach ($images as $image) {
            $image->delete();
        }

        Storage::disk('public')->deleteDirectory('status/' . $status_id);
        return redirect()->back()->with('status', 'Пост успішно видалено!');
    }
}
