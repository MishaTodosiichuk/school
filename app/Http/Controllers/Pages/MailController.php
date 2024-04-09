<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreRequest;
use App\Mail\Contacts\SendMessageMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __invoke(StoreRequest $request, Message $message)
    {
        $data = $request->validated();
        $message = Message::query()->create($data);
        Mail::to('todosiichukm@gmail.com')->send(new SendMessageMail($message));
        return redirect()->back()->with('status','Повідомлення успішно відправлено!');
    }
}
