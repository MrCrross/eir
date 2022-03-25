@props(['room'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-amber-200 shadow-md"
    ])}}>
    {!! Form::open(['method' => 'PATCH','route' => ['rooms.update', $room->id]]) !!}
    <div class="flex flex-col items-center p-6">
        <div>
            <div>
                <x-form.label for="name" class="font-bold" value="Название:"></x-form.label>
                <x-form.input
                    id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="$room->name" required></x-form.input>
            </div>
            <div class="w-full text-center mt-2">
                <x-form.button type="submit">
                    Изменить
                </x-form.button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
