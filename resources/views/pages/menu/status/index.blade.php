@extends('layouts.default')

@section('title')
    Статус закладу
@endsection
@section('content')
    <h1>Статус закладу</h1>
    <div class="hr">
        <div class="orange-hr"></div>
        <div class="silver-hr"></div>
    </div>
    <br>
    @if(auth()->user() && auth()->user()->can('admin'))
        <a href="{{route('status.create')}}" class="btn btn-success mt-2">Додати новий пост</a>
    @endif
    @if (session ('status'))
        <div class="alert alert-success mt-2">
            {{session ('status')}}
        </div>
    @endif

    @foreach($status as $data)
        <div class="list">
            <div class="list-content">
                <div class="list-text">
                    <div class="list-title">
                        <a href="{{ route('status.show', $data->id) }}"> <b>{{$data->title}}</b></a>
                    </div>
                    <p>{{$data->info}}</p>
                    <div class="list-date">
                        <p><i>{{$data->updated_at}}</i></p>
                    </div>
                </div>
            </div>
            @if(auth()->user() && auth()->user()->can('admin'))
                <div class="mt-2">
                    <form action="{{route('status.destroy', $data->id)}}" method="post" style="display:inline-block">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                    <a href="{{route('status.edit', $data->id)}}" class="btn btn-primary">Змінити</a>
                </div>
            @endif
        </div>
        <hr>
    @endforeach
@endsection
