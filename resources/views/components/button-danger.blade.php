<button 
    {{ 
        $attributes->merge([
            'type' => 'button', 
            'class' => 'h-9 mt-1 text-white font-bold py-1 rounded bg-red-500 hover:bg-red-700'
        ])
    }}
>
    {{ $slot }}
</button>
