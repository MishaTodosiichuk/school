<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Photogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotogalleryController extends Controller
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
    public function store(Request $request)
    {
        $images = $request->file('image');

        if ($request->hasFile('image')) {
            foreach ($images as $image) {
                $path = $image->storeAs('photogallery/', $image->getClientOriginalName(), 'public');
                Photogallery::create([
                    'path' => $path
                ]);
            }
        }

        return redirect()->back()->with('status','Нове фото додано!');
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
