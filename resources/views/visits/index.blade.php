@extends('layouts.app')

@section('content')
    <x-menu.visit></x-menu.visit>
    <div class="block md:grid md:grid-cols-3 md:gap-3">
        @foreach ($visits as $visit)
            <x-visit class="my-2 w-full" :visit="$visit"></x-visit>
        @endforeach
    </div>


@endsection
