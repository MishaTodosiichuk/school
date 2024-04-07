<?php

namespace App\Http\Controllers\Pages\Menu\Photogallery;

use App\Http\Requests\Pages\Menu\Photogallery\UpdateRequest;
use App\Models\Photogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotogalleryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photogallery::orderBy('id')->paginate(10);

        return view('pages.photogallery.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.photogallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateRequest $request)
    {
        $images = $request->file('image');

        $this->service->store($images);

        return redirect()->back()->with('status','Дані додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photogallery $photogallery)
    {
        Storage::disk('public')->delete($photogallery->path);
        $photogallery->delete();

        return redirect()->back()->with('status','Фото успішно видалено!');
    }
}
