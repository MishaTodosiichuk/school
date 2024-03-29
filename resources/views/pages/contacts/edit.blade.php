@extends('layouts.default')

@section('content')
    <style>

    </style>
    <a href="{{route('contacts.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success mt-2">
            {{session ('status')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form" action="{{route('contacts.update', $contact->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Код ЄДРПОУ</label><br>
            <input type="text" class="form-control" name="code" value="{{$contact->code}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Телефон</label><br>
            <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Адреса</label><br>
            <input type="text" class="form-control" name="address" value="{{$contact->address}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Графік роботи</label><br>
            <input type="text" class="form-control" name="schedule" value="{{$contact->schedule}}">
        </div>
        <div class="mb-3">
            <label class="form-label">E-Mail адреса</label><br>
            <input type="text" class="form-control" name="email" value="{{$contact->email}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Контактні телефони</label><br>
            <input type="text" class="form-control" name="contact_phone" value="{{$contact->contact_phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Керівник установи</label><br>
            <input type="text" class="form-control" name="manager" value="{{$contact->manager}}">
        </div>
        <button type="submit" class="btn btn-success">Оновити</button>
    </form>
@endsection
