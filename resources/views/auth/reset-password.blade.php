<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20"></x-application-logo>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors"></x-auth.validation-errors>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-form.label for="email" :value="__('Почта')"></x-form.label>

                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus></x-form.input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form.label for="password" :value="__('Пароль')"></x-form.label>

                <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required></x-form.input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form.label for="password_confirmation" :value="__('Подтверждение пароль')"></x-form.label>

                <x-form.input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required></x-form.input>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-form.button>
                    {{ __('Восстановить пароль') }}
                </x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>
