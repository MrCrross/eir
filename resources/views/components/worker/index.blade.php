@props(['user'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-gray-200 shadow-md"
    ])}}>
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownUser{{$user->id}}" data-dropdown-toggle="dropdown{{$user->id}}"
                class="hidden sm:inline-block hover:bg-amber-100 fill-gray-100 hover:fill-amber-900 focus:outline-none focus:ring-4 focus:ring-amber-200 rounded-lg text-sm p-1.5"
                type="button">
            <svg class="w-6 h-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown{{$user->id}}"
             class="hidden z-10 w-44 text-base list-none bg-amber-200 rounded divide-y divide-gray-100 shadow">
            <ul class="py-1" aria-labelledby="dropdownButton{{$user->id}}">
                <li>
                    <a href="{{ route('workers.show',$user->id) }}"
                       class="block py-2 px-4 text-sm text-amber-700 hover:bg-amber-100 ">Просмотр</a>
                </li>
                <li>
                    <a href="{{ route('workers.edit',$user->id) }}"
                       class="block py-2 px-4 text-sm text-blue-700 hover:bg-amber-100">Изменить</a>
                </li>
                <li>
                    {!! Form::open(['method' => 'DELETE','route' => ['workers.destroy', $user->id],'style'=>'display:inline']) !!}
                    <button type="submit"
                            class="block w-full py-2 px-4 text-sm text-left text-red-600 hover:bg-amber-100 ">
                        Удалить
                    </button>
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
        <div>
            <div>
                <span class="font-bold">ФИО:</span>
                <span>{{ $user->last_name." ".$user->first_name." ".$user->father_name }}</span>
            </div>
            <div>
                <span class="font-bold">Почта:</span>
                <span>{{ $user->email }}</span>
            </div>
            <div>
                <span class="font-bold">Номер телефона:</span>
                <span>{{ $user->phone }}</span>
            </div>
            <div>
                <span class="font-bold">Должность:</span>
                <span>{{ $user->workers[0]->post->name }}</span>
            </div>
            <div>
                <span class="font-bold">Кабинет:</span>
                <span>{{ $user->workers[0]->room->name }}
                </span>
            </div>
            <div>
                <span class="font-bold">Расписание:</span>
                @foreach($user->workers[0]->seances as $seance)
                    <div>{{mb_substr($seance->name,0,5)}}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
