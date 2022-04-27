@extends('layouts.app')

@section('content')
    <x-menu.visit></x-menu.visit>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-visit.create class="max-w-sm" :clients="$clients"></x-visit.create>
        </div>
    </div>
@endsection
