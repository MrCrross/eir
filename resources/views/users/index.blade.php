@extends('layouts.app')

@section('content')
    <x-menu.user></x-menu.user>
    <div class="block md:grid md:grid-cols-3 md:gap-3">
        @foreach ($data as $key => $user)
            <x-user class="my-2 w-full" :user="$user"></x-user>
        @endforeach
    </div>


@endsection
