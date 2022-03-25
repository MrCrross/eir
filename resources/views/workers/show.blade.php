@extends('layouts.app')

@section('content')
    <x-menu.worker></x-menu.worker>

    <div class="w-full">
        <x-worker class="my-2 max-m-sm" :user="$data"></x-worker>
    </div>
@endsection
