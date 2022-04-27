<div class="flex flex-row px-5 py-3 text-bold items-center justify-between align-middle shadow bg-amber-200">
    <h2 class="text-xl text-gray-900 leading-tight">Записи</h2>
    <div class="flex flex-row">
        @if(Auth::user()->hasRole('doctor'))
        <x-a.info href="{{ route('records.index') }}" class="flex items-center mx-2">Просмотр</x-a.info>
            @endif
    </div>
</div>
