@extends('layouts.app')

@section('content')
    <x-menu.post></x-menu.post>

    <div class="w-full">
        <x-post class="max-w-sm mx-auto my-2" :post="$post"></x-post>
    </div>
@endsection
