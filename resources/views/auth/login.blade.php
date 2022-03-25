<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20"></x-application-logo>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth.session-status class="mb-4" :status="session('status')"></x-auth.session-status>

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors"></x-auth.validation-errors>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-form.label for="name" :value="__('Логин')"></x-form.label>

                <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus></x-form.input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.label for="password" :value="__('Пароль')"></x-form.label>

                <x-form.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"></x-form.input>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amber-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-100">{{ __('Запомнить меня') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-100 hover:text-gray-200" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif

                <x-form.button class="ml-3">
                    {{ __('Войти') }}
                </x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>
