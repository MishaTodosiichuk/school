@extends('layouts.default')

@section('content')

    <a href="{{route('news.index')}}" class="btn btn-warning mb-2">Назад</a>
    @if (session ('status'))
        <div class="alert alert-success">
            {{session ('status')}}
        </div>
    @endif
    <form class="form" action="{{route('test')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Виберіть новину до якої будуть додані наступні файл/и</label><br>
                <select class="form-select" name="news_id">
                @foreach($news as $data)
                        <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
                </select>
            @error('news_id')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Виберіть фотографію / ї</label><br>
            <div class="mb-3">
                <input class="form-control" type="file" name="news_images[]" multiple>
            </div>
            @error('images')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <hr>
        <div class="mb-3">
            <label class="form-label">Виберіть файл / и</label><br>
            <div class="mb-3">
                <input class="form-control" type="file" name="news_files[]" multiple>
            </div>
            @error('files')
            <div class="alert alert-danger mt-4">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Створити</button>
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

