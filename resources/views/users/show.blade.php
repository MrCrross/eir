@extends('layouts.app')

@section('content')
    <x-menu.user></x-menu.user>

    <div class="w-full">
        <x-user class="max-w-sm mx-auto my-2" :user="$user"></x-user>
    </div>
@endsection
