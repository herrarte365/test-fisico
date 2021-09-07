 <div class="mt-1 flex rounded-md shadow-sm">
    <span class="h-9 inline-flex items-center px-3 rounded-l-md border border-r-0 border-bluegray-800 text-cian-300 text-sm  dark:bg-gray-800">
      {{ $slot }}
    </span><!--h-9 mt-1 sm:text-sm dark:bg-gray-800 dark:text-white focus:ring-opacity-50 rounded-md shadow-sm border-bluegray-800 focus:border-cian-300-->
    <input 
        {!! $attributes->merge([
                'class' => 'h-9 border-bluegray-800 focus:border-cian-300 flex-1 block w-full rounded-none rounded-r-md sm:text-sm dark:text-white dark:bg-gray-800',
                'type'  => 'text',
                'value' => ''
            ])
        !!}
</div> 