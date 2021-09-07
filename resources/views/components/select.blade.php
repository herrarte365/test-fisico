<select
    {!! $attributes->merge([
            'class' => 'text-white mt-1 block w-full py-2 px-3 dark:bg-gray-800 border-none rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm',
        ])
    !!}
>
{{ $slot }}
</select>