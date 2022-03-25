@extends('layouts.app')

@section('content')
    <x-menu.room></x-menu.room>
    <div class="block md:grid md:grid-cols-3 md:gap-3">
        @foreach ($rooms as $room)
            <x-room class="my-2 w-full" :room="$room"></x-room>
        @endforeach
    </div>


@endsection
