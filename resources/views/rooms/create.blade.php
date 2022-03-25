@extends('layouts.app')

@section('content')
    <x-menu.room></x-menu.room>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-room.create class="max-w-sm"></x-room.create>
        </div>
    </div>
@endsection
