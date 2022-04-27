@extends('layouts.app')

@section('content')
    <x-menu.visit></x-menu.visit>
    <div class="block w-full">
        <x-visit.show class="my-2 w-full" :visit="$visit"></x-visit.show>
    </div>
@endsection
