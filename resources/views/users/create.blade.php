@extends('layouts.app')

@section('content')
    <x-menu.user></x-menu.user>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-user.create class="max-w-sm" :roles="$roles"></x-user.create>
        </div>
    </div>
@endsection
