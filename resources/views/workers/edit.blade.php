@extends('layouts.app')

@section('content')

    <x-menu.worker></x-menu.worker>

    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-worker.edit class="max-w-sm" :user="$user" :posts="$posts" :rooms="$rooms"></x-worker.edit>
        </div>
    </div>
@endsection
