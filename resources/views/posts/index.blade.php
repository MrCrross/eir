@extends('layouts.app')

@section('content')
    <x-menu.post></x-menu.post>
    <div class="block md:grid md:grid-cols-3 md:gap-3">
        @foreach ($posts as $post)
            <x-post class="my-2 w-full" :post="$post"></x-post>
        @endforeach
    </div>


@endsection
