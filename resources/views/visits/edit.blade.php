@extends('layouts.app')

@section('content')

    <x-menu.visit></x-menu.visit>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-visit.edit class="max-w-sm" :visit="$visit"></x-visit.edit>
        </div>
    </div>
@endsection
