@props(['clients'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-amber-200 shadow-md"
    ])}}>
    {!! Form::open(['method' => 'POST','route' => ['visits.store']]) !!}
    <div class="flex flex-col items-center p-6">
        <div>
            <div class="mb-4 float-right">
                <x-a.success href="{{route('users.create')}}">Добавить клиента</x-a.success>
            </div>
            <div>
                <x-form.label for="client_id" class="font-bold" value="Клиент:"></x-form.label>
                <x-form.select
                    id="client_id" class="block mt-1 w-full" name="client_id"
                    required>
                    @foreach($clients as $client)
                        <?php $date = date_create_from_format('Y-m-d',$client->birthday) ?>
                        <option value="{{$client->id}}">{{$client->user->last_name." ".
$client->user->first_name." ".$client->user->father_name." (".$date->format('d.m.Y').")"}}</option>
                    @endforeach
                </x-form.select>
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
