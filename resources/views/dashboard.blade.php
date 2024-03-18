@extends('layouts.default')

@section('content')
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>

            <a href="{{route('roles.index')}}">Ролі</a>
        </form>
    </div>
@endsection
