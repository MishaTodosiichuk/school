<?php

namespace App\Http\Controllers\Pages\Menu\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\Menu\Contacts\UpdateRequest;
use App\Models\Contact;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Contact $contact)
    {

        $data = $request->validated();
        $contact->update($data);
        return redirect()->back()->with('status','Оновлення успішне!');
    }
}
