@props(['disabled' => false])

<input 
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
            'class' => 'h-9 mt-1 sm:text-sm dark:bg-gray-800 dark:text-white focus:ring-opacity-50 rounded-md shadow-sm border-bluegray-800 focus:border-cian-300',
            'type'  => 'text' 
        ])
    !!}
>
 