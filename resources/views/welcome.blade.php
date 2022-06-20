@extends('layouts.app')

@section('content')
    <div class="w-full text-center my-10 font-bold">
        Добро пожаловать в {{config('app.name')}} - Информационную систему "Поликлиника".
    </div>

    @guest
        {!! Form::open(['method'=>'POST','route'=>['records.store']])!!}
        <div class="w-1/2 mx-auto bg-amber-600 rounded-lg shadow-md">
            <div class="w-full text-center border border-b-amber-200 border-amber-600 rounded-t-lg">
                <h4 class="text-white font-bold my-3">Выполните запись</h4>
            </div>
            <div class="flex flex-row">
                <div
                    class="flex m-5 flex-col w-64 mx-auto items-center">
                    <div>
                        <div>
                            <x-form.label for="last_name" class="font-bold" value="Фамилия:"></x-form.label>
                            <x-form.input
                                id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                required></x-form.input>
                        </div>
                        <div class="mt-2">
                            <x-form.label for="first_name" class="font-bold" value="Имя:"></x-form.label>
                            <x-form.input
                                id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                required></x-form.input>
                        </div>
                        <div class="mt-2">
                            <x-form.label for="father_name" class="font-bold" value="Отчество:"></x-form.label>
                            <x-form.input
                                id="father_name" class="block mt-1 w-full" type="text"
                                name="father_name"></x-form.input>
                        </div>
                        <div class="mt-2">
                            <x-form.label for="email" :value="__('Почта')"></x-form.label>

                            <x-form.input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="old('email')"
                                          required></x-form.input>
                        </div>
                        <div class="mt-2">
                            <x-form.label for="phone" class="font-bold" value="Номер телефона:"></x-form.label>
                            <x-form.input
                                id="phone" class="block mt-1 w-full" type="tel" name="phone"
                                required></x-form.input>
                        </div>
                        <div class="mt-2">
                            <x-form.label for="birthday" class="font-bold" value="Дата рождения:"></x-form.label>
                            <x-form.input
                                id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                                max="{{date('Y-m-d')}}"
                                required></x-form.input>
                        </div>
                    </div>
                </div>
                <div
                    class="flex my-5 flex-col w-64 mx-auto items-center">
                    <div>
                        <div>
                            <x-form.label for="worker" class="font-bold" value="Врач:"></x-form.label>
                            <x-form.select
                                id="worker" class="block mt-1 w-full" name="worker_id" required>
                                @foreach($users as $user)
                                    <option value="{{$user->workers[0]->id}}">{{$user->workers[0]->post->name.". ".$user->last_name." "
                                .ucfirst(mb_substr($user->first_name,0,1))."."
                                .ucfirst(mb_substr($user->father_name,0,1))}}</option>
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="my-2">
                            <x-form.label for="day" class="font-bold" value="Дата:"></x-form.label>
                            <x-form.input
                                id="day" class="block mt-1 w-full" type="date" name="day" min="{{date('Y-m-d')}}"
                                value="{{date('Y-m-d')}}" required></x-form.input>
                        </div>
                        <div class="my-2">
                            <x-form.label for="seances" class="font-bold" value="Расписание:"></x-form.label>
                            <div class="flex items-center seanceCheck hidden">
                                <label class="text-sm font-medium text-gray-100">
                                    <input type="radio"
                                           name="seances[]"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                                    <span></span>
                                </label>
                            </div>
                            <div class="seances my-3">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="w-full text-center border border-t-amber-200 border-amber-600 rounded-b-lg">
                <x-form.button class="my-3" type="submit">
                    Записаться
                </x-form.button>
            </div>
        </div>

        {!! Form::close() !!}

    @else
        {!! Form::open(['method'=>'POST','route'=>['records.store']])!!}
        <div class="w-1/2 mx-auto bg-amber-600 rounded-lg shadow-md">
            <div class="w-full text-center border border-b-amber-200 border-amber-600 rounded-t-lg">
                <h4 class="text-white font-bold my-3">Выполните запись</h4>
            </div>
            <div class="flex flex-row">
                <x-form.input
                    id="last_name" class="hidden mt-1 w-full" value="{{Auth::user()->last_name}}" type="text"
                    name="last_name"
                    required></x-form.input>
                <x-form.input
                    id="first_name" class="hidden mt-1 w-full" value="{{Auth::user()->first_name}}" type="text"
                    name="first_name"
                    required></x-form.input>
                <x-form.input
                    id="father_name" class="hidden mt-1 w-full" value="{{Auth::user()->father_name}}" type="text"
                    name="father_name"></x-form.input>
                <x-form.input id="email" class="hidden mt-1 w-full" type="text" name="email"
                              value="{{Auth::user()->email}}"
                              required></x-form.input>
                <x-form.input
                    id="phone" class="hidden mt-1 w-full" value="{{Auth::user()->phone}}" type="text" name="phone"
                    required></x-form.input>
                <div
                    class="flex my-5 flex-col w-64 mx-auto items-center">
                    <div>
                        <div>
                            <x-form.label for="worker" class="font-bold" value="Врач:"></x-form.label>
                            <x-form.select
                                id="worker" class="block mt-1 w-full" name="worker_id" required>
                                @foreach($users as $user)
                                    <option value="{{$user->workers[0]->id}}">{{$user->workers[0]->post->name.". ".$user->last_name." "
                                .ucfirst(mb_substr($user->first_name,0,1))."."
                                .ucfirst(mb_substr($user->father_name,0,1))}}</option>
                                @endforeach
                            </x-form.select>
                        </div>
                        <div class="my-2">
                            <x-form.label for="day" class="font-bold" value="Дата:"></x-form.label>
                            <x-form.input
                                id="day" class="block mt-1 w-full" type="date" name="day" min="{{date('Y-m-d')}}"
                                value="{{date('Y-m-d')}}" required></x-form.input>
                        </div>
                        <div class="my-2">
                            <x-form.label for="seances" class="font-bold" value="Расписание:"></x-form.label>
                            <div class="flex items-center seanceCheck hidden">
                                <label class="text-sm font-medium text-gray-100">
                                    <input type="radio"
                                           name="seances[]"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                                    <span></span>
                                </label>
                            </div>
                            <div class="seances my-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full text-center border border-t-amber-200 border-amber-600 rounded-b-lg">
                <x-form.button class="my-3" type="submit">
                    Записаться
                </x-form.button>
            </div>
        </div>

        {!! Form::close() !!}
    @endguest

    <script>
        function init() {
            const worker = document.querySelector('#worker')
            const day =document.querySelector('#day')
            fetch('{{route('records.seances')}}', {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": '{{csrf_token()}}'
                },
                method: 'POST',
                credentials: "same-origin",
                body: JSON.stringify({
                    worker_id: worker.value,
                    day:day.value
                })
            })
                .then(res => res.json())
                .then(res => {
                    reload(res.seances)
                })
        }

        document.addEventListener('DOMContentLoaded', function () {
            const worker = document.querySelector('#worker')
            const day =document.querySelector('#day')
            worker.addEventListener('change', function (e) {
                fetch('{{route('records.seances')}}', {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": '{{csrf_token()}}'
                    },
                    method: 'POST',
                    credentials: "same-origin",
                    body: JSON.stringify({
                        worker_id: e.target.value,
                        day:day.value
                    })
                })
                    .then(res => res.json())
                    .then(res => {
                        reload(res.seances)
                    })
            })
            init()
        })


        function reload(arr) {
            const seances = document.querySelector('.seances')
            const checks = seances.querySelectorAll('div')
            checks.forEach(function (el) {
                el.remove()
            })
            arr.forEach(function (seance) {
                const checkClone = document.querySelector('.seanceCheck').cloneNode(true)
                checkClone.classList.remove('hidden')
                const input = checkClone.querySelector('input[type="radio"]')
                input.value = seance.id
                checkClone.querySelector('span').innerHTML = seance.name.slice(0, 5)
                seances.append(checkClone)
            })
        }


    </script>

@endsection
