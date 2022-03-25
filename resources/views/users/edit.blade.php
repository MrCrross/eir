@extends('layouts.app')

@section('content')

    <x-menu.user></x-menu.user>

    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-user.edit class="max-w-sm" :user="$user" :roles="$roles"></x-user.edit>
        </div>
    </div>
@endsection
