@extends('layouts.app')

@section('content')
    <x-menu.lk></x-menu.lk>

    <x-lk :user="$user"></x-lk>

@endsection
