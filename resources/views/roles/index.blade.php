@extends('layouts.default')

@section('content')
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if (session ('status'))
                    <div class="alert alert-success mt-4">
                        {{
                        session ('status') }}
                    </div>
                @endif
                @if(auth()->user()->can('add role'))
                        <a href="{{route ('roles.create')}}" class="btn btn-success mb-4">Додати нову роль</a>
                @endif

                @foreach ($roles as $role)
                        <div class="card mb-4">
                        <h5 class="card-header">{{$role->name}}</h5>
                        <div class="card-body">
                            @if(auth()->user()->can('add edit'))
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary">Змінити</a>
                            @endif
                                @if(auth()->user()->can('add delete'))
                                    <form action="{{route('roles.destroy', $role->id)}}" method="post" style="display:inline-block">
                                        @csrf
                                        @method ('DELETE')
                                        <button type="submit" class="btn btn-danger">Видалити</button>
                                    </form>
                                @endif
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
