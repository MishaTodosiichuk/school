@extends('layouts.default')

@section('content')

    <div style="width: 100%">
        <a href="{{route('status.index')}}" class="btn btn-warning mb-2">Назад</a>
        <h1>{{$status->title}}</h1>
        @foreach($photos as $photo)
            <img src="../storage/{{$photo->path}}" alt="" class="mb-3" style="width: 100%;">
        @endforeach
    </div>
@endsection


