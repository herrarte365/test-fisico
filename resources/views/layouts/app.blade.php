<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pruebas Físicas</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen dark:bg-gray-800">
            <x-navigation />

            <!-- Page Heading -->
            @if (isset($header))
                        <!--========== HEADER ==========-->
        <header class="header dark:bg-gray-900">
            <div class="header__container dark:text-white">

                {{ $header }}
                
    
                @auth

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative menu_user" x-data="{ open: false }">
                        <div>
                            <button x-on:click="open = !open" type="button"
                                class="bg-gray-100 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only bg-gray-100">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            </button>
                        </div>

                        <!--
                                      Dropdown menu, show/hide based on menu state.
                          
                                      Entering: "transition ease-out duration-100"
                                        From: "transform opacity-0 scale-95"
                                        To: "transform opacity-100 scale-100"
                                      Leaving: "transition ease-in duration-75"
                                        From: "transform opacity-100 scale-100"
                                        To: "transform opacity-0 scale-95"
                                    -->
                        <div x-show="open" x-on:click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="border dark:border-gray-700 dark:bg-gray-900 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm dark:text-white"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">
                                Tu perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm dark:text-white"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    Salir
                                </a>
                            </form>
                        </div>
                    </div>

                @else
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        <a href="{{ route('login') }}"
                            class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}"
                            class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Registrarse
                        </a>
                    </div>
                @endauth

                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle" style='color:#ffffff'></i>
                </div>
            </div>
        </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            
            Livewire.on('alerta', estado => {

                switch(estado){
                    case 101: 
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Datos Actualizados con éxito.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    break;
                    case 102: 
                        Swal.fire({
                            position: 'top-end',
                            text: 'Resultado calculado con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    break;
                    case 103: 
                        Swal.fire({
                            position: 'top-end',
                            text: 'Error al generar resultados finales',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    break;
                    case 104: 
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Se ha ingresado un dato incorrecto.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    break;
                    case 105:
                        Swal.fire({
                            position: 'top-end',
                            text: 'Valor ingresado incorrecto. Por favor ingrese un valor númerico correcto.',
                            showConfirmButton: false,
                            timer: 1900
                        });                        
                    break;
                    case 106:
                        Swal.fire({
                            position: 'top-end',
                            text: 'Error al realizar acción.',
                            showConfirmButton: false,
                            timer: 1900
                        });                        
                    break;
                    case 107:
                        Swal.fire({
                            confirmButtonColor: '#229954',
                            icon: 'success',
                            title: 'Atleta Actualizado',
                            text: 'El Grupo y Edad del Atleta Fueron Actualizados',
                        });                      
                    break;
                    case 108:
                        Swal.fire({
                            confirmButtonColor: '#229954',
                            icon: 'success',
                            title: 'Registro de Atletas',
                            text: 'Atleta agregado con éxito',
                        });                      
                    break;                    
                }

            });

        </script>
    </body>
</html>
