@extends('layouts.default')

@section('content')
    <div class="block">
        <h1>{{$news->title}}</h1>
        <div class="silver-hr"></div>
        <div class="top">
            <div class="date-content">Дата публікації - {{$news->created_at}}</div>
            {{--<div class="count-views">Кількість переглядів: {{$news->count_views}}</div>--}}
        </div>
        <div class="silver-hr"></div>
        <div class="content">
            {!! $news->info !!}
            @if($photos->isNotEmpty())
                @include('components.files.image', $photos)
            @endif
            @if($files->isNotEmpty())
                @include('components.files.file', $files)
            @endif
        </div>
    </div>
@endsection
