<a {{$attributes->merge([
    'class'=>
    "text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:ring-red-600 font-medium rounded-lg
    text-sm px-5 py-2.5 text-center"])}}>
    {{$slot}}
</a>
