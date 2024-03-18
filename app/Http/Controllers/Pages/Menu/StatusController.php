<?php

namespace App\Http\Controllers\Pages\Menu;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::orderBy('title')->paginate(10);

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
            'img' => 'required',
        ]);

        Status::create($data);

        return redirect()->back()->with('status','Нову роль додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }
}

