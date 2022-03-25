@extends('layouts.app')

@section('content')
    <x-menu.worker></x-menu.worker>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-worker.create class="max-w-sm" :rooms="$rooms" :posts="$posts"></x-worker.create>
        </div>
    </div>
@endsection
