@extends('layouts.default')

@section('content')
    <div class="news-block">
        <h1>{{$news->title}}</h1>
        <hr>
        <div class="news-top">
            <div class="news-date">Дата: {{$news->updated_at}}</div>
            <div class="count-views">Кількість переглядів: {{$news->count_views}}</div>
        </div>
        <hr>
        <div class="news-content">
            {!! $news->info !!}
            <hr>
            <div class="photos">
                @foreach($photos as $photo)
                    <div class="news-photo">
                        <img src="{{url('storage/' . $photo->path)}}" alt="{{$photo->path}}" class="mb-3">
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
