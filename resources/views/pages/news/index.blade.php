@extends('layouts.default')

@section('content')
    <div class="home">
        @include('components.slider')
        <div class="title-text">
            <b>Вітаємо Вас на офіційному сайті Васловівського ЗЗСО!</b>
        </div>
        <div class="hr">
            <div class="orange-hr"></div>
            <div class="silver-hr"></div>
        </div>
        <br>
        <div class="main_title">
            <b>Новини нашої школи:</b>
        </div>
        <hr>
        @if(auth()->user() && auth()->user()->can('admin'))
            <a href="{{route('news.create')}}" class="btn btn-success mt-2">Додати пост</a>
            @if($news->isNotEmpty())
                <a href="{{route('news_photo.create')}}" class="btn btn-success mt-2">Додати файли до поста</a>
            @endif
        @endif
        @include('components.status')
        @include('components.errors')
        <div class="section">
            <div class="content">
                @foreach($news as $data)
                    <div class="text">
                        <div class="title">
                            <b>{{$data->title}}</b>
                        </div>
                        {!! $data->info !!}
                        <div class="date">
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
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <script src="../js/slider.js"></script>
@endsection
