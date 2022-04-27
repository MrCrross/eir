<div class="flex flex-row px-5 py-3 text-bold items-center justify-between align-middle shadow bg-amber-200">
    <h2 class="text-xl text-gray-900 leading-tight">Прием</h2>
    <div class="flex flex-row">
        <x-a.info href="{{ route('visits.index') }}" class="flex items-center mx-2">Просмотр</x-a.info>
        <x-a.success href="{{ route('visits.create') }}" class="flex items-center mx-2">Провести</x-a.success>
    </div>
</div>
