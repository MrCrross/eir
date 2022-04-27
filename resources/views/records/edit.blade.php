@extends('layouts.app')

@section('content')

    <x-menu.record></x-menu.record>
    <div class="container mx-auto flex flex-row justify-center">
        <div class="my-5">
            <x-record.create class="max-w-sm" :client="$client"></x-record.create>
        </div>
    </div>
@endsection
