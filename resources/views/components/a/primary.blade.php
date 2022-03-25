<a {{$attributes->merge([
    'class'=>
        "text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-blue-600 font-medium rounded-lg
        text-sm px-5 py-2.5 text-center"])}}>
    {{$slot}}
</a>
