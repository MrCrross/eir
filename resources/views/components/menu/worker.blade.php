<div class="flex flex-row px-5 py-3 text-bold items-center justify-between align-middle shadow bg-amber-200">
    <h2 class="text-xl text-gray-900 leading-tight">Управление работниками</h2>
    <div class="flex flex-row">
        <x-a.info href="{{ route('workers.index') }}" class="flex items-center mx-2">Просмотр</x-a.info>
        <x-a.success href="{{ route('workers.create') }}" class="flex items-center mx-2">Добавить</x-a.success>
    </div>
</div>
