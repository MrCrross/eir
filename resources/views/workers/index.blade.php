@extends('layouts.app')

@section('content')
    <x-menu.worker></x-menu.worker>
    <div class="block md:grid md:grid-cols-3 md:gap-3">
        @foreach ($data as $key => $worker)
            <x-worker class="my-2 max-m-sm" :user="$worker"></x-worker>
        @endforeach
    </div>
@endsection
