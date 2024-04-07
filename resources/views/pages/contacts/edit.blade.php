@extends('layouts.default')

@section('content')
    <a href="{{route('contacts.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success mt-2">
            {{session ('status')}}
        </div>
    @endif
    <form class="form" action="{{route('contacts.update', $contact->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Код ЄДРПОУ</label><br>
            <input type="text" class="form-control" name="code" value="{{$contact->code}}">
            @error('code')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Телефон</label><br>
            <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
            @error('phone')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Адреса</label><br>
            <input type="text" class="form-control" name="address" value="{{$contact->address}}">
            @error('address')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Графік роботи</label><br>
            <input type="text" class="form-control" name="schedule" value="{{$contact->schedule}}">
            @error('schedule')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">E-Mail адреса</label><br>
            <input type="text" class="form-control" name="email" value="{{$contact->email}}">
            @error('email')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <input type="hidden" name="id" value="{{$contact->id}}">
        <div class="mb-3">
            <label class="form-label">Контактні телефони</label><br>
            <input type="text" class="form-control" name="contact_phone" value="{{$contact->contact_phone}}">
            @error('contact_phone')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Керівник установи</label><br>
            <input type="text" class="form-control" name="manager" value="{{$contact->manager}}">
            @error('manager')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Оновити</button>
    </form>
@endsection
