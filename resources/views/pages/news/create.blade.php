@extends('layouts.default')

@section('content')
    <a href="{{route('news.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success">
            {{session ('status')}}
        </div>
    @endif
    <form class="form" action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id">
        <div class="mb-3">
            <label class="form-label">Заголовок</label><br>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Текст</label><br>
            <input type="text" class="form-control" name="info" value="{{ old('info') }}">
            @error('info')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="image[]" multiple style="width: 100%;">
        </div>
        <button type="submit" class="btn btn-success">Створити</button>
    </form>
@endsection
