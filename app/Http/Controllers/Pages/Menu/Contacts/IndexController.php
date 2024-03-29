<?php

namespace App\Http\Controllers\Pages\Menu\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $info = Contact::all();

        return view('pages.contacts.index', compact('info'));
    }
}
