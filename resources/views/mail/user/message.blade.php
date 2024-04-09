@component('mail::message')
    ПІБ:  {{$message->user}} <br>
    Електронна адреса: {{$message->email}} <br>
    Телефон: {{$message->phone}} <br>
    Повідомлення: {{$message->text}} <br>
    Відправлено: {{$message->created_at}} <br>
@endcomponent
