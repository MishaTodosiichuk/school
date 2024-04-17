@extends('layouts.default')

@section('content')
    <div class="home">
        <div id="slider-container">
            <div id="slides">
                <div class="slide">
                    <img src="../img/header.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="../img/news/news.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="../img/header.jpeg" alt="">
                </div>
            </div>
            <div class="prev" onclick="prevSlide()">‹</div>
            <div class="next" onclick="nextSlide()">›</div>
        </div>
        <div class="title">
            <b>Вітаємо Вас на офіційному сайті Васловівського ЗЗСО!</b>
        </div>
        <div class="hr">
            <div class="orange-hr"></div>
            <div class="silver-hr"></div>
        </div>
        <br>
        <div class="title-news">
            <b>Новини нашої школи:</b>
        </div>
        <hr>
        @if(auth()->user() && auth()->user()->can('admin'))
            <a href="{{route('news.create')}}" class="btn btn-success mt-2">Додати нову новину</a>
            <a href="{{route('news_photo.create')}}" class="btn btn-success mt-2">Додати фотографії для новин</a>
        @endif
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
        <div class="news">
            <div class="news-content">
                @foreach($news as $data)
                    <div class="news-text">
                        <div class="news-title">
                            <b>{{$data->title}}</b>
                        </div>
                        {!! $data->info !!}
                        <div class="news-date">
                            <p><i>{{$data->updated_at}}</i></p>
                        </div>
                        <div class="mt-2">
                            <a href="{{route('news.show', $data->id)}}" class="btn btn-warning">Детальніше...</a>
                            @if(auth()->user() && auth()->user()->can('admin'))
                                <form action="{{route('news.destroy', $data->id)}}" method="post"
                                      style="display:inline-block">
                                    @csrf
                                    @method ('DELETE')
                                    <button type="submit" class="btn btn-danger">Видалити</button>
                                </form>
                                <a href="{{route('news.edit', $data->id)}}" class="btn btn-primary">Змінити</a>
                        </div>
                        @endif
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="../js/slider.js"></script>
@endsection
