@props(['visit'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-amber-200 shadow-md"
    ])}}>
    {!! Form::open(['method' => 'PATCH','route' => ['visits.update', $visit->id]]) !!}
    <div class="flex flex-col items-center p-6">
        <div>
            <div>
                <x-form.label class="font-bold" value="Работник:"></x-form.label>
                <span>{{$visit->worker->post->name." ".
$visit->worker->user->last_name." ".
mb_substr($visit->worker->user->first_name,0,1).".".mb_substr($visit->worker->user->father_name,0,1)}}</span>
            </div>
            <div>
                <x-form.label for="client_id" class="font-bold" value="Клиент:"></x-form.label>
                <span>{{$visit->client->user->last_name." ".
$visit->client->user->first_name." ".$visit->client->user->father_name}}</span>
            </div>
            <div>
                <x-form.label  class="font-bold" value="Дата приема:"></x-form.label>
                <span>{{$visit->seance}}</span>
            </div>
            <div>
                <x-form.label for="description" class="font-bold" value="Описание приема:"></x-form.label>
                <x-form.textarea
                    id="description" class="block mt-1 w-full" name="description"
                    required>{{$visit->description}}</x-form.textarea>
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
