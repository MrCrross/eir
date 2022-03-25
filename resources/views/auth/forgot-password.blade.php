<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20"></x-application-logo>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-100">
            {{ __('Забыли Ваш пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы отправим вам ссылку для сброса пароля, которая позволит вам задать новый.') }}
        </div>

        <!-- Session Status -->
        <x-auth.session-status class="mb-4" :status="session('status')"></x-auth.session-status>

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors"></x-auth.validation-errors>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-form.label for="email" :value="__('Почта')"></x-form.label>

                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus></x-form.input>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-form.button>
                    {{ __('Ссылка для сброса пароля электронной почты') }}
                </x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>
