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
        <div class="news">
            <div class="news-content">
                <div class="news-img">
                    <a href="{{route('pages.news')}}"><img src="../img/news/news.jpeg" alt="Заголовок"></a>
                </div>
                <div class="news-text">
                    <div class="news-title">
                        <b>Заголовок</b>
                    </div>
                    <p>Опис новини</p>
                    <div class="news-date">
                        <p><i>Дата та час викладання</i></p>
                    </div>
                </div>

            </div>
            <hr>
            <div class="news-content">
                <div class="news-img">
                    <img src="../img/news/news.jpeg" alt="Заголовок">
                </div>
                <div class="news-text">
                    <div class="news-title">
                        <b>Заголовок</b>
                    </div>
                    <p>Опис новини</p>
                    <div class="news-date">
                        <p><i>Дата та час викладання</i></p>
                    </div>
                </div>
                <div class="news-img">
                    <img src="../img/news/news.jpeg" alt="Заголовок">
                </div>
                <div class="news-text">
                    <div class="news-title">
                        <b>Заголовок</b>
                    </div>
                    <p>Опис новини</p>
                    <div class="news-date">
                        <p><i>Дата та час викладання</i></p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <script src="../js/slider.js"></script>
@endsection
