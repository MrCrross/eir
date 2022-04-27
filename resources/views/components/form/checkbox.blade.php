@props(['name','value', 'checked'=>''])
<div {{$attributes->merge([
    'class'=>"flex items-center"
])}}>
    <label class="text-sm font-medium text-gray-100">
    <input type="checkbox"
           name="{{$name}}"
           value="{{$value}}"
           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500" {{$checked}}>
    {{$slot}}</label>
</div>
