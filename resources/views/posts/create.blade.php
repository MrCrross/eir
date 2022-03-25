@extends('layouts.app')

@section('content')
    <x-menu.post></x-menu.post>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-post.create class="max-w-sm"></x-post.create>
        </div>
    </div>
@endsection
