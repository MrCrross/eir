@extends('layouts.app')

@section('content')
    <x-menu.lk></x-menu.lk>
    <x-lk.edit :user="$user"></x-lk.edit>
@endsection
