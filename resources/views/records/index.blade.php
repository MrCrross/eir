@extends('layouts.app')

@section('content')
    <x-menu.record></x-menu.record>
    <div class="block md:grid md:grid-cols-3 md:gap-3">
        @foreach ($records as $record)
            <x-record class="my-2 w-full" :record="$record"></x-record>
        @endforeach
    </div>

@endsection
