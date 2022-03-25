@props(['user','posts','rooms'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-amber-200 shadow-md"
    ])}}>
    {!! Form::open(['method' => 'PATCH','route' => ['workers.update',$user->id]]) !!}
    <div class="flex flex-col items-center p-6">
        <div>
            <div>
                <x-form.label for="last_name" class="font-bold" value="Фамилия:"></x-form.label>
                <x-form.input
                    id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="$user->last_name"
                    required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="first_name" class="font-bold" value="Имя:"></x-form.label>
                <x-form.input
                    id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="$user->first_name"
                    required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="father_name" class="font-bold" value="Отчество:"></x-form.label>
                <x-form.input
                    id="father_name" class="block mt-1 w-full" type="text" name="father_name"
                    :value="$user->father_name"
                ></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="name" class="font-bold" value="Логин:"></x-form.label>
                <x-form.input
                    id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="$user->name"
                    required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="email" class="font-bold" value="Почта:"></x-form.label>
                <x-form.input
                    id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="$user->email"
                    required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="phone" class="font-bold" value="Номер телефона:"></x-form.label>
                <x-form.input
                    id="phone" class="block mt-1 w-full" type="tel" name="phone"
                    :value="$user->phone"
                    required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="post" class="font-bold" value="Должность:"></x-form.label>
                <x-form.select
                    id="post" class="block mt-1 w-full" name="post" required>
                    @foreach($posts as $post)
                        <option value="{{$post->id}}" @if($post->id === $user->workers[0]->post->id) selected @endif>{{$post->name}}</option>
                    @endforeach
                </x-form.select>
            </div>
            <div class="mt-2">
                <x-form.label for="room" class="font-bold" value="Кабинет:"></x-form.label>
                <x-form.select
                    id="room" class="block mt-1 w-full" name="room" required>
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}" @if($room->id === $user->workers[0]->room->id) selected @endif>{{$room->name}}</option>
                    @endforeach
                </x-form.select>
            </div>
            <div class="mt-2">
                <x-form.label for="password" class="font-bold" value="Пароль:"></x-form.label>
                <x-form.input
                    id="password" class="block mt-1 w-full" type="password" name="password" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="password_confirmation" class="font-bold" value="Подтвердите пароль:" ></x-form.label>
                <x-form.input
                    id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required></x-form.input>
            </div>
            <div class="w-full text-center mt-2">
                <x-form.button type="submit">
                    Добавить
                </x-form.button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
