@extends('layouts.default')

@section('content')
    <a href="{{route('status.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success mt-2">
            {{session ('status')}}
        </div>
    @endif
    <form class="form" action="{{route('status.update', $status->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Заголовок</label><br>
            <input type="text" class="form-control" name="title" value="{{$status->title}}">
            @error('title')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Текст</label><br>
            <input type="text" class="form-control" name="info" value="{{$status->info}}">
            @error('info')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="image[]" multiple>
            @error('image')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Оновити</button>
    </form>
@endsection
