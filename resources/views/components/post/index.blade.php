@props(['post'])
<div {{$attributes->merge([
    'class'=>"bg-amber-600 rounded-lg border border-gray-200 shadow-md"
    ])}}>
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownUser{{$post->id}}" data-dropdown-toggle="dropdown{{$post->id}}"
                class="hidden sm:inline-block hover:bg-amber-100 fill-gray-100 hover:fill-amber-900 focus:outline-none focus:ring-4 focus:ring-amber-200 rounded-lg text-sm p-1.5"
                type="button">
            <svg class="w-6 h-6 " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown{{$post->id}}"
             class="hidden z-10 w-44 text-base list-none bg-amber-200 rounded divide-y divide-gray-100 shadow">
            <ul class="py-1" aria-labelledby="dropdownButton{{$post->id}}">
                <li>
                    <a href="{{ route('posts.show',$post->id) }}"
                       class="block py-2 px-4 text-sm text-amber-700 hover:bg-amber-100 ">Просмотр</a>
                </li>
                <li>
                    <a href="{{ route('posts.edit',$post->id) }}"
                       class="block py-2 px-4 text-sm text-blue-700 hover:bg-amber-100">Изменить</a>
                </li>
                <li>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
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
                <span class="font-bold">Название:</span>
                <span>{{ $post->name}}</span>
            </div>
        </div>
    </div>
</div>
