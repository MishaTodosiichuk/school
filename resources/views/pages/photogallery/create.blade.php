@extends('layouts.default')

@section('content')
    <style>
        .form{
            width: 100%;
        }

    </style>
    <a href="{{route('photogallery.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success">
            {{session ('status')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form" action="{{route('photogallery.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input class="form-control" type="file" name="image[]" multiple style="width: 100%;">
        </div>
        <button type="submit" class="btn btn-success">Створити</button>
    </form>
@endsection
