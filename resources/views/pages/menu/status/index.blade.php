@extends('layouts.default')

@section('title')Статус закладу@endsection
@section('content')
    @include('inc.list-block-filter')
    <a href="{{route('status.create')}}" class="btn btn-success">Додати новий пост</a>
    @foreach($status as $data)
        <div class="list">
            <div class="list-content">
                <div class="list-img">
                    <img src=<?php __DIR__ ?>"/../img/news/{{$data->img}}" alt="Заголовок">
                </div>
                <div class="list-text">
                    <div class="list-title">
                        <b>{{$data->title}}</b>
                    </div>
                    <p>{{$data->info}}</p>
                    <div class="list-date">
                        <p><i>{{$data->updated_at}}</i></p>
                    </div>
                </div>
            </div>
            <div class="mt-2">
    {{--            @if(auth()->user()->can('add delete'))--}}
                    <form action="{{route('status.destroy', $role->id)}}" method="post" style="display:inline-block">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
    {{--            @endif--}}
                <a href="{{route('status.edit')}}" class="btn btn-primary">Змінити</a>
            </div>
        </div>
        <hr>
    @endforeach



@endsection
