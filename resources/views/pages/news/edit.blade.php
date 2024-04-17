@extends('layouts.default')

@section('content')
    <a href="{{route('pages.news.index')}}" class="btn btn-warning mb-2">Назад</a>
{{--    <a href="{{route('news_photo.edit', $news->id)}}" class="btn btn-primary mb-2">Змінити</a>--}}
    @if (session ('status'))
        <div class="alert alert-success mt-2">
            {{session ('status')}}
        </div>
    @endif
    <form class="form" action="{{route('news.update', $news->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Заголовок</label><br>
            <input type="text" class="form-control" name="title" value="{{$news->title}}">
            @error('title')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Текст</label><br>
            <textarea class="summernote" id="info" name="info">{{$news->info}}</textarea>
            @error('info')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Оновити</button>
    </form>
@endsection
@push('css')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{asset('plugins/summernote/lang/summernote-uk-UA.js')}}"></script>
    <script>
        $(document).ready( function () {
            $("#info ").summernote();
        });
        $('#info').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endpush
