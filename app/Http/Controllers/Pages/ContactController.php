<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = Contact::all();

        return view('pages.contacts.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Contact $contact)
    {
        return view('pages.contacts.edit', compact(['contact']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'code' => 'required|integer',
            'phone' => 'required|max:255',
            'address' => 'required|max:255|email',
            'schedule' => 'required|max:255',
            'email' => 'required|max:255',
            'contact_phone' => 'required|max:255',
            'manager' => 'required|max:255',
        ]);
        $contact->update($data);
        return redirect()->back()->with('status','Оновлення успішне!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
