<button 
    {{ 
        $attributes->merge([
            'type' => 'button', 
            'class' => 'h-9 mt-1 mx-2 text-white font-bold py-1 px-4 rounded bg-cian-500 hover:bg-cian-600'
        ])
    }}
>
    {{ $slot }}
</button>
