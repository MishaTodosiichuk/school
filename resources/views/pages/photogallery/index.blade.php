@extends('layouts.default')

@section('content')
    <h1>Фотогалерея</h1>
    <div class="hr">
        <div class="orange-hr"></div>
        <div class="silver-hr"></div>
    </div>
    @if(auth()->user() && auth()->user()->can('admin'))
        <a href="{{route('photogallery.create')}}" class="btn btn-success mt-2">Додати нову фотографію</a>
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
    <div class="photogallery">
        @foreach($photos as $data)
        <div class="photo">
            <img src="../storage/{{$data->path}}" alt="">
            @if(auth()->user() && auth()->user()->can('admin'))
            <div class="mt-2">
                <form action="{{route('photogallery.destroy', $data->id)}}" method="post" style="display:inline-block">
                    @csrf
                    @method ('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
    </div>
@endsection
