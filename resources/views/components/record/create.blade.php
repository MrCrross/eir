@props(['client'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-amber-200 shadow-md"
    ])}}>
    {!! Form::open(['method' => 'POST','route' => ['visits.store']]) !!}
    <div class="flex flex-col items-center p-6">
        <div>
            <div>
                <x-form.label for="client_id" class="font-bold" :value="$client->user->last_name.' '.$client->user->first_name.' '.$client->birthday.' года рождения'"></x-form.label>
                <input type="text" name="client_id" value="{{$client->id}}" hidden required>
            </div>
            <div>
                <x-form.label for="description" class="font-bold" value="Описание приема:"></x-form.label>
                <x-form.textarea
                    id="description" class="block mt-1 w-full" name="description"
                    required></x-form.textarea>
            </div>
            <div class="w-full text-center mt-2">
                <x-form.button type="submit">
                    Добавить
                </x-form.button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
