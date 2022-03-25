@extends('layouts.app')

@section('content')

    <x-menu.room></x-menu.room>

    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-room.edit class="max-w-sm" :room="$room"></x-room.edit>
        </div>
    </div>
@endsection
