@props(['record'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-gray-200 shadow-md"
    ])}}>
    <div class="flex justify-end px-4 pt-4">
        @if(Auth::user()->hasRole('doctor'))
        <button id="dropdownUser{{$record->id}}" data-dropdown-toggle="dropdown{{$record->id}}"
                class="hidden sm:inline-block hover:bg-amber-100 fill-gray-100 hover:fill-amber-900 focus:outline-none focus:ring-4 focus:ring-amber-200 rounded-lg text-sm p-1.5"
                type="button">
            <svg class="w-6 h-6 " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown{{$record->id}}"
             class="hidden z-10 w-44 text-base list-none bg-amber-200 rounded divide-y divide-gray-100 shadow">
            <ul class="py-1" aria-labelledby="dropdownButton{{$record->id}}">
                <li>
                    <a href="{{ route('records.edit',$record->client->id) }}"
                       class="block py-2 px-4 text-sm text-green-700 hover:bg-amber-100">Принять</a>
                </li>
            </ul>
        </div>
            @endif
    </div>
    <div class="flex flex-col items-center pb-10">
        <div>
            <div>
                <span class="font-bold">Работник:</span>
                <span>{{$record->worker->post->name." ".
$record->worker->user->last_name." ".
mb_substr($record->worker->user->first_name,0,1).".".mb_substr($record->worker->user->father_name,0,1)}}</span>
            </div>
            <div>
                <span class="font-bold">Клиент:</span>
                <span>{{$record->client->user->last_name." ".
$record->client->user->first_name." ".$record->client->user->father_name}}</span>
            </div>
            <div>
                <span class="font-bold">Дата приема:</span>
                <span>{{$record->day}} {{$record->seance->name}}</span>
            </div>
        </div>
    </div>
</div>
