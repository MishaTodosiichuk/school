@extends('layouts.default')

@section('content')
    <div class="contacts">
        <h1>Контактна інформація</h1>
        <div class="hr">
            <div class="orange-hr"></div>
            <div class="silver-hr"></div>
        </div>
        <br>
        <div class="info">
            <ul>
                <li><b>Код ЄДРПОУ:</b> 21445574</li>
                <li><b>Телефон:</b> (03737)48145</li>
                <li><b>Адреса:</b> Чернівецька область, Заставнівський район, с.Васловівці, вул. Головна, 52
                </li>
                <li><b>Графік роботи:</b> пн-пт 8:00-17:00
                </li>
                <li><b>E-Mail адреса:</b> nvk.vaslovivzi@gmail.com
                </li>
                <li><b>Контактні телефони:</b> 0372 226375
                </li>
                <li><b>Керівник установи:</b> Перепелюк Микола Михайлович
                </li>
            </ul>
        </div>
        <hr>
        <h1>Форма для зворотнього зв'язку</h1>
        <div class="hr">
            <div class="orange-hr"></div>
            <div class="silver-hr"></div>
        </div>
        <br>
        <form method="get" action="{{route('send')}}">
            @csrf
            <div class="form contact-form">
                <label class="form-label"><b>ПІБ: </b><span class="required-field">*</span></label><br>
                <input type="text" class="form-control" id="user_name"><br>
                <label class="form-label"><b>Електронна адреса: </b><span class="required-field">*</span></label><br>
                <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp"><br>
                <label class="form-label"><b>Телефон: </b><span class="required-field">*</span></label><br>
                <input type="text" class="form-control" id="user_phone"><br>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Напишіть тут своє повідомлення: </b><span class="required-field">*</span></label><br>
                    <textarea class="form-control" id="user_text" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-warning contact-btn">Надіслати повідомлення</button>
            </div>
        </form>
    </div>
@endsection
