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
            @auth()
                @if (session ('status'))
                    <div class="alert alert-success mt-2">
                        {{session ('status')}}
                    </div>
                @endif
            @endauth
            @foreach($info as $contact)
                <ul>
                    <li><b>Код ЄДРПОУ: </b>{{$contact->code}}</li>
                    <li><b>Телефон: </b>{{$contact->phone}}</li>
                    <li><b>Адреса: </b>{{$contact->address}}</li>
                    <li><b>Графік роботи: </b>{{$contact->schedule}}</li>
                    <li><b>E-Mail адреса: </b>{{$contact->email}}</li>
                    <li><b>Контактні телефони: </b>{{$contact->contact_phone}}</li>
                    <li><b>Керівник установи: </b>{{$contact->manager}}</li>
                </ul>
                @if(auth()->user() && auth()->user()->can('admin'))
                    <a href="{{route('contacts.edit', $contact->id)}}" class="btn btn-primary">Змінити</a>
                @endif
            @endforeach
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
            @if (session ('status'))
                <div class="alert alert-success mt-2 error">
                    {{session ('status')}}
                </div>
            @endif
            <div class="form contact-form">
                <div class="mb-3">
                    <label class="form-label"><b>ПІБ: </b><span class="required-field">*</span></label><br>
                    <input type="text" class="form-control" name="user" value="{{ old('user') }}"><br>
                </div>
                @error('user')
                <div class="alert alert-danger mt-3 error">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label"><b>Електронна адреса: </b><span
                            class="required-field">*</span></label><br>
                    <input type="email" class="form-control" aria-describedby="emailHelp"
                           name="email" value="{{ old('email') }}"><br>
                </div>
                @error('email')
                <div class="alert alert-danger mt-3 error">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label"><b>Телефон: </b><span class="required-field">*</span></label><br>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"><br>
                </div>
                @error('phone')
                <div class="alert alert-danger mt-3 error">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"><b>Напишіть тут своє
                            повідомлення: </b><span class="required-field">*</span></label><br>
                    <textarea class="form-control" rows="3" name="text">{{ old('text') }}</textarea>
                </div>
                @error('text')
                <div class="alert alert-danger mt-3 error">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-warning contact-btn">Надіслати повідомлення</button>
            </div>
        </form>
    </div>
@endsection
