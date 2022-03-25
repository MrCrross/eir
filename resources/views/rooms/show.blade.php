@extends('layouts.app')

@section('content')
    <x-menu.room></x-menu.room>

    <div class="w-full">
        <x-room class="max-w-sm mx-auto my-2" :room="$room"></x-room>
    </div>
@endsection
