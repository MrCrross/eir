@extends('layouts.app')

@section('content')

    <x-menu.post></x-menu.post>

    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-post.edit class="max-w-sm" :post="$post"></x-post.edit>
        </div>
    </div>
@endsection
