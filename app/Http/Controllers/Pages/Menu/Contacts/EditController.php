<?php

namespace App\Http\Controllers\Pages\Menu\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Contact $contact)
    {
        return view('pages.contacts.edit', compact(['contact']));
    }
}
