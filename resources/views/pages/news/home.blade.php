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
        <a href="{{route('news.create')}}" class="btn btn-success mt-2">Додати нову новину</a>
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
                        <a href="{{route('news.show', $data->id)}}"><b>{{$data->title}}</b></a>
                    </div>
                    <p>{{$data->info}}</p>
                    <div class="news-date">
                        <p><i>{{$data->updated_at}}</i></p>
                    </div>
                    <div class="mt-2">
                        {{--            @if(auth()->user()->can('add delete'))--}}
                        <form action="{{route('news.destroy', $data->id)}}" method="post" style="display:inline-block">
                            @csrf
                            @method ('DELETE')
                            <button type="submit" class="btn btn-danger">Видалити</button>
                        </form>
                        {{--            @endif--}}
                        <a href="{{route('news.edit', $data->id)}}" class="btn btn-primary">Змінити</a>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
        </div>
    </div>
    <script src="../js/slider.js"></script>
@endsection
