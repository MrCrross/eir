<textarea {{$attributes->merge([
    'class'=>"block text-sm text-gray-900 bg-white
rounded-lg shadow-sm border border-gray-300 focus:border-amber-300
focus:ring-amber-300"
    ])}}>{{$slot}}</textarea>
