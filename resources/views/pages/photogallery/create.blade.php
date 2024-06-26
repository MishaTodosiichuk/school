@extends('layouts.default')

@section('content')
    <a href="{{route('photogallery.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success">
            {{session ('status')}}
        </div>
    @endif
    <form class="form" action="{{route('photogallery.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input class="form-control" type="file" name="path">
        </div>
        @error('path')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="btn btn-success">Створити</button>
    </form>
@endsection
