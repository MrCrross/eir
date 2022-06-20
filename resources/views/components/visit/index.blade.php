@props(['visit'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-gray-200 shadow-md"
    ])}}>
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownUser{{$visit->id}}" data-dropdown-toggle="dropdown{{$visit->id}}"
                class="hidden sm:inline-block hover:bg-amber-100 fill-gray-100 hover:fill-amber-900 focus:outline-none focus:ring-4 focus:ring-amber-200 rounded-lg text-sm p-1.5"
                type="button">
            <svg class="w-6 h-6 " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown{{$visit->id}}"
             class="hidden z-10 w-44 text-base list-none bg-amber-200 rounded divide-y divide-gray-100 shadow">
            <ul class="py-1" aria-labelledby="dropdownButton{{$visit->id}}">
                <li>
                    <a href="{{ route('visits.show',$visit->id) }}"
                       class="block py-2 px-4 text-sm text-amber-700 hover:bg-amber-100">Просмотр</a>
                </li>
                <li>
                    <a href="{{ route('visits.edit',$visit->id) }}"
                       class="block py-2 px-4 text-sm text-blue-700 hover:bg-amber-100">Изменить</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
        <div>
            <div>
                <span class="font-bold">Врач:</span>
                <span>{{$visit->worker->post->name." ".
$visit->worker->user->last_name." ".
mb_substr($visit->worker->user->first_name,0,1).".".mb_substr($visit->worker->user->father_name,0,1)}}</span>
            </div>

            <div>
                <span class="font-bold">Клиент:</span>
                <span>{{$visit->client->user->last_name." ".
$visit->client->user->first_name." ".$visit->client->user->father_name}}</span>
            </div>
            <div>
                <span class="font-bold">Дата приема:</span>
                <span>{{$visit->seance}}</span>
            </div>
        </div>
    </div>
</div>
