<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20"></x-application-logo>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-2" :errors="$errors"></x-auth.validation-errors>

        <form method="POST" action="{{ route('register') }}">
            @csrf
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
                    id="father_name" class="block mt-1 w-full" type="text" name="father_name"></x-form.input>
            </div>
            <!-- Name -->
            <div class="mt-2">
                <x-form.label for="name" :value="__('Логин')"></x-form.label>

                <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus></x-form.input>
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <x-form.label for="email" :value="__('Почта')"></x-form.label>

                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required></x-form.input>
            </div>
            <div class="mt-2">
                <x-form.label for="phone" class="font-bold" value="Номер телефона:"></x-form.label>
                <x-form.input
                    id="phone" class="block mt-1 w-full" type="tel" name="phone"
                    required></x-form.input>
            </div>
            <!-- Password -->
            <div class="mt-2">
                <x-form.label for="password" :value="__('Пароль')"></x-form.label>

                <x-form.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"></x-form.input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-form.label for="password_confirmation" :value="__('Подтверждение пароля')"></x-form.label>

                <x-form.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required></x-form.input>
            </div>

            <div class="flex items-center justify-end mt-2">
                <a class="underline text-sm text-gray-100 hover:text-gray-200" href="{{ route('login') }}">
                    {{ __('Уже зарегистрированы?') }}
                </a>

                <x-form.button class="ml-4">
                    {{ __('Зарегистрироваться') }}
                </x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>
