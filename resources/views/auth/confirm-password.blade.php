<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20"></x-application-logo>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Это безопасная область приложения. Пожалуйста, подтвердите свой пароль, прежде чем продолжить.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors"></x-auth.validation-errors>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-form.label for="password" :value="__('Пароль')"></x-form.label>

                <x-form.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"></x-form.input>
            </div>

            <div class="flex justify-end mt-4">
                <x-form.button>
                    {{ __('Подтвердить') }}
                </x-form.button>
            </div>
        </form>
    </x-auth.card>
</x-guest-layout>
