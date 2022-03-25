<a {{$attributes->merge([
    'class'=>
    "text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:ring-green-600 font-medium rounded-lg
        text-sm px-5 py-2.5 text-center"
    ])}}>
    {{$slot}}
</a>
