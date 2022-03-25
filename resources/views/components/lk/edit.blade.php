@props(['user'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-amber-200 shadow-md"
    ])}}>
    {!! Form::open(['method' => 'PATCH','route' => ['lk.update', $user->id]]) !!}
    <div class="flex flex-col items-center p-6">
        <div>
            <div>
                <input type="text" name="role" value="{{$user->role}}" required hidden readonly>
                <x-form.label for="last_name" class="font-bold" value="Фамилия:"></x-form.label>
                <x-form.input
                    id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="$user->last_name" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="first_name" class="font-bold" value="Имя:"></x-form.label>
                <x-form.input
                    id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="$user->first_name" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="father_name" class="font-bold" value="Отчество:"></x-form.label>
                <x-form.input
                    id="father_name" class="block mt-1 w-full" type="text" name="father_name"
                    :value="$user->father_name"></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="name" class="font-bold" value="Логин:"></x-form.label>
                <x-form.input
                    id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="$user->name" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="email" class="font-bold" value="Почта:"></x-form.label>
                <x-form.input
                    id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="$user->email" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="phone" class="font-bold" value="Номер телефона:"></x-form.label>
                <x-form.input
                    id="phone" class="block mt-1 w-full" type="tel" name="phone"
                    :value="$user->phone" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="password" class="font-bold" value="Пароль:"></x-form.label>
                <x-form.input
                    id="password" class="block mt-1 w-full" type="password" name="password"></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="password_confirmation" class="font-bold" value="Подтвердите пароль:"></x-form.label>
                <x-form.input
                    id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation"></x-form.input>
            </div>
            @if(count($user->clients)!==0)
                <div>
                    <x-form.label for="birthday" class="font-bold" value="Дата рождения:"></x-form.label>
                    <x-form.input
                        id="birthday" class="block mt-1 w-full" type="date" :value="$user->clients[0]->birthday"
                        name="birthday"></x-form.input>
                </div>
            @endif
            <div class="w-full text-center mt-2">
                <x-form.button type="submit">
                    Изменить
                </x-form.button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
