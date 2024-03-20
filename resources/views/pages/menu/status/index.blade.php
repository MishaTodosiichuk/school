@extends('layouts.default')

@section('title')Статус закладу@endsection
@section('content')
    @include('inc.list-block-filter')
    <a href="{{route('status.create')}}" class="btn btn-success mt-2">Додати новий пост</a>
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
            <div class="mt-2">
    {{--            @if(auth()->user()->can('add delete'))--}}
                    <form action="{{route('status.destroy', $data->id)}}" method="post" style="display:inline-block">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
    {{--            @endif--}}
                <a href="{{route('status.edit', $data->id)}}" class="btn btn-primary">Змінити</a>
            </div>
        </div>
        <hr>
    @endforeach
@endsection
